// @ts-check
import { defineConfig } from "astro/config";
import { fileURLToPath } from "node:url";
import tailwindcss from "@tailwindcss/vite";
import sitemap from "@astrojs/sitemap";
import { loadEnv } from "vite";

const { APP_URL } = loadEnv(import.meta.env.MODE, process.cwd(), "");

export default defineConfig({
  site: APP_URL ?? "https://danielhaven.com",

  vite: {
    plugins: [tailwindcss()],
    resolve: {
      alias: {
        "@/": fileURLToPath(new URL("./src/", import.meta.url)) + "/",
      },
    },
  },

  integrations: [sitemap()],

  redirects: {
    '/billsforynab': 'https://billsforynab.com'
  }
});
