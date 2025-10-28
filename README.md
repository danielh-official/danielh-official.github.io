# Daniel Haven - Developer Website

Developer blog website built with Jigsaw.

## 🛠️ Development

### Local Development
```bash
# Install dependencies
composer install
npm install

# Start development server
npm run dev

# Start development server with watch
npm run watch

# Build for local development
npm run build

# Build for production
npm run build:prod

# Format code
npm run format
```

## 📝 Content

- **Blog Posts**: Located in `source/_posts/`
- **Pages**: Located in `source/`
- **Components**: Located in `source/_components/`
- **Layouts**: Located in `source/_layouts/`

## 🚀 Deployment

This site is automatically deployed to GitHub Pages using GitHub Actions:

- **Trigger**: Push to `main` branch
- **Build**: PHP 8.2 + Node.js 18
- **Deploy**: GitHub Pages via Actions
- **URL**: https://danielh-official.github.io/

## 🔧 Configuration

Key configuration is in `config.php`:
- Site metadata
- Collections (posts, categories)

## 📄 License

This project is open source and available under the [MIT License](LICENSE.txt).
