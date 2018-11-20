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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/css/reset.css',
    'public/css/layout.css',
    'public/css/components.css',
    'public/css/plugins.css',
    'public/css/theme.css',
], 'public/css/kios-sehati.css');

mix.scripts(['resources/js/blankon.js'], 'public/js/kios-sehati.js');
