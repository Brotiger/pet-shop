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
    .js('resources/js/singl/forms.js', 'public/js/singl/forms.js')
    .js('resources/js/singl/deleteRecord.js', 'public/js/singl/deleteRecord.js')
    .js('resources/js/singl/searchRecord.js', 'public/js/singl/searchRecord.js')
    .js('resources/js/singl/product.js', 'public/js/singl/product.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();