/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/**/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
      },
      colors: {
        'sidebar': '#262261', // Sidebar color
        // 'primary': '#FFA500', // Primary color
      },
    },
  },
  plugins: [],
}