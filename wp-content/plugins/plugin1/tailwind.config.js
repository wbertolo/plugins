/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,php}", "./**/*.{html,php}"],
    important: true,
    theme: {
      extend: {
        colors: {
          'blue-light': '#9fe8f6',
          'blue-medium': '#00414f',
          'blue-dark': '#002830',
          'purple-medium': '#66229f',
          'purple-medium-2': '#2f0850',        
          'purple-light': '#d3b5f1',
        },
      },
    },
    plugins: [],
}