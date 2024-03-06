/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/**/**/*.{html,js,php}"],
  theme: {
    height:{
      '32': '8rem',
      '64': '16rem',
      '96': '24rem',
      '128': '32rem',
      '160': '40rem',
      '192': '48rem',
    },
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
        'russo': ['Russo One'],
      },
      colors: {
        'sidebar': '#262261', // Sidebar color
        'primary': '#FFA500', // Primary color
      },
      spacing: {
        '1': '8px',
        '2': '12px',
        '3': '16px',
        '4': '24px',
        '5': '32px',
        '6': '48px',
        '7': '64px',
        '8': '96px',
        '9': '128px',
        '10': '192px',
      },
      height:{
        '32': '8rem',
        '64': '16rem',
        '96': '24rem',
        '128': '32rem',
        '160': '40rem',
        '192': '48rem',
      }
    },
  },
  plugins: [],
}