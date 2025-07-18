import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
        display: ['Playfair Display', ...defaultTheme.fontFamily.serif],
      },
      colors: {
        primary: '#B33D24',
        lowPrimary: '#B33D2480',
        secondary: '#8f2d1e',
        secondaryBackground: '#D9D9D9',
        contentTextDisplay: '#595959',
      },
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
