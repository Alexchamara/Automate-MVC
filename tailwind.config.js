/** @type {import('tailwindcss').Config} */
module.exports = {
  // content: ["./*.php", "./lang/*.php", "./lang/*.html", "./js/custom.min.js", "./src/**/*.{html,js,php}"],
  // purge: ['./src/**/*.{js,jsx,ts,tsx}', './public/index.html'],
  content: [
    "./store/app/views/**/*.{html,js,php}",
  ],
  // darkMode: false,
  theme: {
    extend: {
      skew: {
        '30': '-30deg',
      },
      transformOrigin: {
        'bottom': 'bottom',
      },
      boxShadow: {
        '3xl': '0px 17px 11px #80808099',
        '4xl': '0 0 19px 3px #80808099',
        '5xl': '0px 6px 15px #808080',
        '6xl': '0 4px 7px 0 #00000023, 0 .6px 2px 0 #0000001c',
      },
      backgroundImage: {
        'custom-gradient': 'linear-gradient(45deg, black, transparent)',
        'custom-gradient-hover': 'linear-gradient(45deg, red, transparent)',
      },
      colors: {
        customBlue: '#0b196f',
        customGray: '#D9D9D9',
        customRed: '#A82E23',
      },
    },
  },
  plugins: [
    function ({ addUtilities }) {
      addUtilities({
        '.skew-x-30': {
          transform: 'skewX(-30deg)',
        },
        '.origin-bottom': {
          'transform-origin': 'bottom',
        }
      }, ['responsive', 'hover']);
    }],
}

