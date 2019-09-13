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
    .js('resources/views/seller_panel/limitless_v2/vue/limitless_v2.js', 'public/js/limitless_v2.js')
    .js('resources/views/templates/crocus_v2/vue/crocus_v2.js', 'public/js/crocus_v2.js')
   .css('public/crocus_v2/css/style.css', 'public/css/style.css')
   .sass('resources/sass/app.scss', 'public/css');

