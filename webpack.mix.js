let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('assets/js/app.js', 'public_html/js/')
    .sass('assets/sass/app.scss', 'public_html/css/')
    .options({
        processCssUrls: true,
        fileLoaderDirs: {
            images: "img",
            fonts: "fonts"
        }
    }).
    setPublicPath('public_html');
