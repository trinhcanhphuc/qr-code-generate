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
  .copy('resources/js/libs', 'public/js/libs')

const tailwindcss = require('tailwindcss')

mix.sass('resources/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
  })

mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')

mix.copy('resources/images', 'public/images')
