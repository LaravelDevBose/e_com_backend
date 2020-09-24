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
    .js('resources/views/templates/kuteshop_v2/vue/kuteshop_v2.js', 'public/js/kuteshop_v2.js')
    .sass('resources/sass/app.scss', 'public/css');
