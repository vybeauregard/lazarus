let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('node_modules/bootstrap/dist/fonts/', 'public/fonts')
    .combine([
        'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'node_modules/bootstrap-formhelpers/dist/css/bootstrap-formhelpers.min.css',
    ], 'public/css/vendor.css')
    .combine([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/disableautofill/src/jquery.disableAutoFill.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'node_modules/bootstrap-formhelpers/dist/js/bootstrap-formhelpers.min.js',
        'node_modules/bootstrap-3-typeahead/bootstrap3-typeahead.min.js',
        'node_modules/bootstrap-confirmation2/bootstrap-confirmation.min.js',
    ], 'public/js/vendor.js')
    .version();

