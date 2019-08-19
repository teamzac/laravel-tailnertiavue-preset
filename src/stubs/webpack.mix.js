const mix = require('laravel-mix')
const cssImport = require('postcss-import')
const cssNesting = require('postcss-nesting')
const path = require('path')

mix
  .postCss('resources/css/app.css', 'public/css', [
    cssImport(),
    cssNesting(),
    require('tailwindcss'),
  ])
  .js('resources/js/app.js', 'public/js')
  .babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
  })
  .webpackConfig({
    output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
    resolve: {
      alias: {
        vue$: 'vue/dist/vue.runtime.esm.js',
        '@': path.resolve('resources/js'),
      },
    },
  })
  