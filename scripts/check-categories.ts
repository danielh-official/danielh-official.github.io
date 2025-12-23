#!/usr/bin/env node

import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";
import yaml from "js-yaml";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const postsDir = path.join(__dirname, "..", "source", "_posts");
const categoriesDir = path.join(__dirname, "..", "source", "_categories");

interface Frontmatter {
  categories?: string[];
  [key: string]: any;
}

function checkAndCreateCategories(): number {
  console.log("🔍 Checking for missing categories...\n");

  // Read all post files
  const postFiles = fs.readdirSync(postsDir).filter((f) => f.endsWith(".md"));
  const existingCategories = fs
    .readdirSync(categoriesDir)
    .filter((f) => f.endsWith(".md"))
    .map((f) => path.basename(f, ".md"));

  // Extract all categories from posts
  const allCategories = new Set<string>();

  for (const file of postFiles) {
    const content = fs.readFileSync(path.join(postsDir, file), "utf8");
    const match = content.match(/^---\n([\s\S]*?)\n---/);

    if (match) {
      try {
        const frontmatter = yaml.load(match[1]) as Frontmatter;
        if (frontmatter.categories && Array.isArray(frontmatter.categories)) {
          frontmatter.categories.forEach((cat) => allCategories.add(cat));
        }
      } catch (e) {
        const error = e as Error;
        console.log(`⚠️  Error parsing frontmatter in ${file}:`, error.message);
      }
    }
  }

  // Find missing categories
  const missingCategories = [...allCategories].filter(
    (cat) => !existingCategories.includes(cat),
  );

  console.log("📚 All categories found:", [...allCategories].sort());
  console.log("✅ Existing categories:", existingCategories.sort());
  console.log("❌ Missing categories:", missingCategories.sort());
  console.log();

  if (missingCategories.length > 0) {
    console.log("🔧 Creating missing category files...\n");

    const createdFiles: string[] = [];

    for (const category of missingCategories) {
      const fileName = `${category}.md`;
      const filePath = path.join(categoriesDir, fileName);

      // Capitalize first letter for title
      const title = category.charAt(0).toUpperCase() + category.slice(1);

      const content = `---\nextends: _layouts.category\ntitle: ${title}\n---`;

      fs.writeFileSync(filePath, content);
      createdFiles.push(fileName);
      console.log(`  ✨ Created:  ${fileName}`);
    }

    console.log();
    console.log(
      `✅ Successfully created ${createdFiles.length} category file(s)!`,
    );

    // Output for GitHub Actions
    if (process.env.GITHUB_OUTPUT) {
      fs.appendFileSync(
        process.env.GITHUB_OUTPUT,
        `missing_categories=${missingCategories.join(", ")}\n`,
      );
      fs.appendFileSync(process.env.GITHUB_OUTPUT, `has_missing=true\n`);
      fs.appendFileSync(
        process.env.GITHUB_OUTPUT,
        `created_files=${createdFiles.join(", ")}\n`,
      );
    }

    return 1; // Exit code 1 to indicate changes were made
  } else {
    console.log("✅ All categories exist!  No action needed.");

    // Output for GitHub Actions
    if (process.env.GITHUB_OUTPUT) {
      fs.appendFileSync(process.env.GITHUB_OUTPUT, `has_missing=false\n`);
    }

    return 0; // Exit code 0 to indicate no changes
  }
}

// Run the check
const exitCode = checkAndCreateCategories();
process.exit(exitCode);
