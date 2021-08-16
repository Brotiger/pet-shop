const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/singl/category.js', 'public/js/singl/category.js')
    .js('resources/js/singl/deleteCategoryRecord.js', 'public/js/singl/deleteCategoryRecord.js')
    .js('resources/js/singl/deleteProductRecord.js', 'public/js/singl/deleteProductRecord.js')
    .js('resources/js/singl/searchRecord.js', 'public/js/singl/searchRecord.js')
    .js('resources/js/singl/product.js', 'public/js/singl/product.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();