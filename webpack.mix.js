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
  .js('resources/js/customer.js', 'public/js')
  .js('resources/js/internal.js', 'public/js')
  .js('resources/js/vendor-role.js', 'public/js')
  .js('resources/js/whitegloves.js', 'public/js')
  .sourceMaps();

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.sass('resources/sass/customer.scss', 'public/css')
  .sass('resources/sass/internal.scss', 'public/css')
  .sass('resources/sass/vendor-role.scss', 'public/css')
  .sass('resources/sass/whitegloves.scss', 'public/css');

if (mix.inProduction()) {
  mix.version();
}
