const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
      display: ['Poppins', 'sans-serif'],
      body: ['Poppins', 'sans-serif']
    },
    extend: {
      colors: {
        transparent: "transparent",
        current: "currentColor",

        amber: colors.amber,
        blue: colors.blue,
        cyan: colors.cyan,
        emerald: colors.emerald,
        fuchsia: colors.fuchsia,
        indigo: colors.indigo,
        lime: colors.lime,
        orange: colors.orange,
        pink: colors.pink,
        rose: colors.rose,
        sky: colors.sky,
        teal: colors.teal,
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
      // display: ['group-hover'],
      display: ['group-focus'],
      visibility: ['group-hover']
    },
  },

  plugins: [
    // require('@tailwindcss/forms'),
    require('@tailwindcss/typography')
  ],
};