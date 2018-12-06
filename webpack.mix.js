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
    'public/css/theme-midwife.css',
], 'public/css/kios-sehati-midwife.css').version();

mix.styles([
    'public/css/reset.css',
    'public/css/layout.css',
    'public/css/components.css',
    'public/css/plugins.css',
    'public/css/theme.css',
], 'public/css/kios-sehati.css').version();

mix.scripts(['resources/js/blankon.js'], 'public/js/kios-sehati.js').version();

// mix.copyDirectory('bower_components/datatables/media', 'public/vendor/datatables');
// mix.copyDirectory('bower_components/bootstrap-datepicker-vitalets/', 'public/vendor/bootstrap-datepicker-vitalets');
// mix.copyDirectory('bower_components/select2/dist', 'public/vendor/select2');
// mix.copy('bower_components/raphael/raphael.min.js','public/vendor/raphael/raphael.min.js');
// mix.copyDirectory('bower_components/Flot/','public/vendor/flot');
// mix.copyDirectory('bower_components/morris.js/','public/vendor/morris.js/');
// mix.copyDirectory('bower_components/gmap3/dist','public/vendor/gmap3');
// mix.copyDirectory('bower_components/jquery.gritter/','public/vendor/jquyer.gritter/');
// mix.copyDirectory('bower_components/counter-up/','public/vendor/counter-up/');
mix.copyDirectory('bower_components/waypoints/lib','public/vendor/waypoints/');
mix.copyDirectory('bower_components/jvectormap/src/','public/vendor/jvectormap/');
// mix.copyDirectory('bower_components/bootbox.js', 'public/vendor/bootbox');
