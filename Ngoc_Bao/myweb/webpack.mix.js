const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [

    ]);

mix.copyDirectory('resources/views/vegefoods-master/css', 'public/vegefoods/css');
mix.copyDirectory('resources/views/vegefoods-master/js', 'public/vegefoods/js');
mix.copyDirectory('resources/views/vegefoods-master/fonts', 'public/vegefoods/fonts');
mix.copyDirectory('resources/views/vegefoods-master/scss', 'public/vegefoods/scss');
mix.copyDirectory('resources/views/vegefoods-master/images', 'public/vegefoods/image');



// webpack
mix.copyDirectory('vendor/almasaeed2010/adminlte', 'public/themes/adminlte');