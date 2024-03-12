/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/**/**/*.{html,js,php}"],
  safelist: [
    'bg-wave',
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
        'russo': ['Russo One'],
      },
      colors: {
        'sidebar': '#262261', // Sidebar color
        // 'primary': '#FFA500', // Primary color
      },

      backgroundImage: {
        'wave': "url('../public/finance/img/wave.png')",
      },
    },
  },
  plugins: [],
}