const mix = require('laravel-mix');
const flatpickr = require("flatpickr");

mix
  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .options({
    postCss: [
      require('postcss-import'),
      require('tailwindcss'),
      require("autoprefixer")
    ],
  })
  .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

if (mix.inProduction()) {
  mix.version();
}

mix.browserSync({
  proxy: "http://jetstreamLw.test/",
  browser: "Google Chrome",
  open: false,});

mix.disableNotifications();