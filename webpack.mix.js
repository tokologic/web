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
], 'public/css/kios-sehati.css').version();

mix.scripts(['resources/js/blankon.js'], 'public/js/kios-sehati.js').version();

mix.copyDirectory('bower_components/datatables/media', 'public/vendor/datatables');
mix.copyDirectory('bower_components/bootstrap-datepicker-vitalets/', 'public/vendor/bootstrap-datepicker-vitalets');
mix.copyDirectory('bower_components/select2/dist', 'public/vendor/select2');
// mix.copyDirectory('bower_components/bootbox.js', 'public/vendor/bootbox');
