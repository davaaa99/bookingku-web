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
    .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/admin/admin.js', 'public/js/admin')
    .sass('resources/sass/admin.scss', 'public/css/admin');
mix.js('resources/js/client/client.js', 'public/js/client')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    .sass('resources/sass/client.scss', 'public/css/client');
=======
    .sass('resources/sass/client.scss', 'public/css/client');
>>>>>>> origin/newdava-dev
=======
    .sass('resources/sass/client.scss', 'public/css/client');
>>>>>>> origin/qotrun-dev
=======
        .sass('resources/sass/client.scss', 'public/css/client');
>>>>>>> origin/velia_merge-dev
