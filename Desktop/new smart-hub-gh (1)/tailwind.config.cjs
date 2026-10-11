/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './*.{ts,tsx}', './components/**/*.{ts,tsx}', './pages/**/*.{ts,tsx}'],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'sans-serif'],
        display: ['Plus Jakarta Sans', 'sans-serif']
      },
      colors: {
        brand: { blue: '#0055FF', navy: '#0B1121', green: '#00D26A', light: '#F8FAFC', dark: '#020617' }
      }
    }
  },
  plugins: []
};
