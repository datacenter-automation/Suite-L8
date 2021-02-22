const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-banner');
require('laravel-mix-php-manifest');
require('laravel-mix-polyfill');
require('laravel-mix-svg-sprite');
require('laravel-mix-tailwind');
require('laravel-mix-vue-auto-routing');

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

const date = new Date();

// Function to convert
// single digit input
// to two digits
const formatData = (input) => {
  if (input > 9) {
    return input;
  } else return `0${input}`;
};

// Function to convert
// 24 Hour to 12 Hour clock
const formatHour = (input) => {
  if (input > 12) {
    return input - 12;
  }
  return input;
};

// Data about date
const format = {
  dd: formatData(date.getDate()),
  mm: formatData(date.getMonth() + 1),
  yyyy: date.getFullYear(),
  HH: formatData(date.getHours()),
  hh: formatData(formatHour(date.getHours())),
  MM: formatData(date.getMinutes()),
  SS: formatData(date.getSeconds()),
};

const format24Hour = ({dd, mm, yyyy, HH, MM, SS}) => {
  return (`${mm}/${dd}/${yyyy} ${HH}:${MM}:${SS}`);
};

if (require('fs').existsSync('.airdrop_skip')) {
  console.log('Assets already exist. Skipping compilation.');
  process.exit(0);
}

mix
  .banner({
    banner: (function () {
      return [
        '/**',
        ' * @project        Datacenter Automation Suite',
        ' * @author         FiberHop LLC',
        ' * @build          ' + format24Hour(format),
        ' * @release        ALPHA',
        ' *',
        ' */',
        '',
      ].join('\n');
    })(),
    raw: true,
  })

  .js('resources/js/app.js', 'public/js')
  .extract(['vue', 'vue-router'], 'js/vue-resources')
  .extract(['tailwindcss',], 'js/tailwindcss-resources')

  .js('resources/js/customer.js', 'public/js')
  .js('resources/js/internal.js', 'public/js')
  .js('resources/js/vendor-role.js', 'public/js')
  .js('resources/js/whitegloves.js', 'public/js')
  .sourceMaps()

  .postCss('resources/css/app.css', 'public/css')
  .sass('resources/sass/customer.scss', 'public/css')
  .sass('resources/sass/internal.scss', 'public/css')
  .sass('resources/sass/vendor-role.scss', 'public/css')
  .sass('resources/sass/whitegloves.scss', 'public/css')

  .phpManifest()

  .polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: "firefox 50, IE 11"
  })

  // .svgSprite(
  //   'src/icons', // The directory containing your SVG files
  //   'output/sprite.svg', // The output path for the sprite
  // )

  .vue()
  .vueAutoRouting()

  .tailwind()

  .webpackConfig({
    module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: "ts-loader",
          exclude: /node_modules/
        }
      ]
    },
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'resources/js/'),
        '@Components': path.resolve(__dirname, 'resources/js/Components'),
        '~': path.resolve(__dirname, 'resources/sass/'),
      },
      extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"]
    }
  });

if (mix.inProduction()) {
  mix.version();
}
