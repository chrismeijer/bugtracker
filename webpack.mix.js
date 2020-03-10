const mix = require('laravel-mix');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');

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
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        plugins: [
            new ReplaceInFileWebpackPlugin([{
                dir: 'public/css',
                files: ['app.css'],
                rules: [{
                    search: /\/fonts\//g,
                    replace: '../fonts/'
                }]
            }])
        ]
    })
;