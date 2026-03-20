# Custom Theme

Developer guide for working with this WordPress theme.

---

# Requirements

- WordPress local environment running
- Node.js and npm installed
- Git installed
- Theme located in `wp-content/themes/custom-theme` or your local equivalent

**Note:** `node_modules` are **not included in the repository**, so dependencies must be installed after cloning or pulling the theme.

---

# Getting the Theme

## Clone the repository (first time)

Navigate to your WordPress themes directory:

```bash
cd wp-content/themes
```

Clone the repository:

```bash
git clone https://github.com/c8-sam/rh_-2.0.git
```

Enter the theme directory and install dependencies:

```bash
cd custom-theme
npm install
```

## Update an existing install

```bash
git pull
npm install
```

---

# Development

Start the development watcher:

```bash
npm run watch
```

This will rebuild assets automatically when files change.

Edit source files in:

```
src/css/
src/js/
template-parts/
includes/
```

Compiled assets will update in:

```
assets/dist/
```

---

# Build Commands

Development build:

```bash
npm run dev
```

Production build:

```bash
npm run build
```

Run the production build before deploying the theme.

---

# Build Process

Webpack compiles frontend assets from:

```
src/js/bundle.js
src/css/bundle.css
```

Compiled output is written to:

```
assets/dist/js/bundle.js
assets/dist/css/bundle.css
```

These compiled files are what WordPress loads.

---

# WordPress Notes

- The theme version is defined in `style.css`
- Frontend assets are enqueued from `includes/enqueue.php`
- Asset versioning uses each built file's `filemtime` for automatic cache busting

---

# Useful Commands

```bash
git pull
npm install
npm run watch
npm run dev
npm run build
```

---

# Important Notes

- Edit files inside `src/`
- **Do not edit files inside `assets/dist/`**
- Always run `npm run build` before deploying the theme