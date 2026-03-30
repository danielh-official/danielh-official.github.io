# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Personal portfolio website for Daniel Haven at danielhaven.com. Built with Astro 5 + Tailwind CSS 4, deployed automatically to GitHub Pages on push to `main`.

## Commands

```bash
pnpm install        # Install dependencies
pnpm dev            # Dev server at localhost:4321
pnpm build          # Production build → ./dist/
pnpm preview        # Preview production build locally
```

Docker (serves on port 8080):
```bash
docker compose up --build   # Build and run
docker compose watch        # Watch mode for auto-rebuilds
```

There are no tests in this project.

## Architecture

**Framework:** Astro with file-based routing (`src/pages/` → URL paths). All pages are statically generated (SSG).

**Key directories:**
- `src/pages/` — routes. Each subdirectory maps to a product (e.g., `/wake-up-get-up/`, `/things-tag-manager/`)
- `src/layouts/MainLayout.astro` — shared layout wrapping all pages (header, nav, footer)
- `src/components/` — `HomeLink.astro` (styled link buttons on homepage) and `ScreenshotFrame.astro` (product screenshot wrapper)
- `src/styles/global.css` — Tailwind base imports + custom global styles
- `src/assets/` — images/icons optimized via Astro's Sharp integration

**Routing & redirects:** Legacy URL redirects (e.g., `/billsforynab`) are configured in `astro.config.mjs`, not in page files.

**Interactivity:** The software gallery page (`src/pages/software/index.astro`) uses vanilla client-side JS for category filtering — no framework hydration.

**Path alias:** `@/` maps to `./src/` (configured in both `tsconfig.json` and `astro.config.mjs`).

**Deployment:** `.github/workflows/deploy.yml` builds with `withastro/action@v5` and deploys to GitHub Pages. No manual deployment needed — just push to `main`.

**Site URL:** Controlled via `APP_URL` env var (defaults to `http://localhost:8080` in `.env`; production uses `https://danielhaven.com`).
