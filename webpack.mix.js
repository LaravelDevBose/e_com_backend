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
    .js('resources/views/frontend/main.js', 'public/js/main.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    output:{
        chunkFilename:'js/vuejs_code_split/[name].js',
    }
});
