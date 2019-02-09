## Building ContentBlocks Assets

For ContentBlocks we're using npm scripts. 

```` shell
cd assets/components/contentblocks/
npm install
# make coffee
npm run build
````

Node and npm needs to be installed. On Mac, installation via Homebrew is recommended. 

Different commands are available, `npm run build` runs them all.

- For only CSS: `npm run build:css`
- For only JS: `npm run build:js` (or even more specific, `npm run build:js:main` or `npm run build:js:inputs`)
- To automatically build when changes happen: `npm run watch`, `npm run watch:js` or `npm run watch:css`
