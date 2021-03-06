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
        //
    ]);

mix.styles('resources/css/projects.css', 'public/css/projects.css');
mix.styles('resources/css/tasks.css', 'public/css/tasks.css');
mix.js('resources/js/projects.js', 'public/js/projects.js');
mix.js('resources/js/tasks.js', 'public/js/tasks.js');
