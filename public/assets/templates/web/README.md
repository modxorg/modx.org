# MODX.org template

## Prerequisites

### Node

Make sure you got *node* isntalled in version **10.12.x or higher**. You can test this with:
```
node -v
v10.12.0
```

## Project initialization

To init the project after cloning it, `cd` into the projects template folder
```
cd public/assets/templates/web
```
and install (dev) dependencies via npm
```
npm install
```

## Start development

Normaly when starting your Frontend work, you want to start livereload and automatically watch for file changes:
```
npm start
```

## Watch & Build

To start the watch process use (this watches for file changes and build the changed files)
```
npm run watch
```

## CSS

To just build the CSS use
```
npm run build:css
```

## JS

To just build the JS (for development) use
```
npm run build:js
```

## SVG

To just build the SVG sprite use
```
npm run build:svg
```

## Prepare a new release version

To build CSS, JS and SVG for production usage use
```
npm run release
```
