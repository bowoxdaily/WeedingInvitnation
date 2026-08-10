/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        ivory: '#FFFFF0',
        champagne: '#F7E7CE',
        sage: {
          100: '#E8EFE7',
          200: '#D1DFD0',
          300: '#B2C5B0',
          400: '#8DAD8A',
          500: '#6B9568',
        },
        forest: {
          700: '#2D4A3E',
          800: '#1F3530',
          900: '#132220',
        },
        gold: {
          300: '#E8D08A',
          400: '#D4B86A',
          500: '#C9A84C',
          600: '#A8892E',
        },
      },
      fontFamily: {
        serif: ['Cormorant Garamond', 'Playfair Display', 'Georgia', 'serif'],
        sans: ['Poppins', 'Inter', 'system-ui', 'sans-serif'],
      },
      animation: {
        'fade-in': 'fadeIn 1s ease-in-out',
        'fade-up': 'fadeUp 0.8s ease-out',
        'float': 'float 3s ease-in-out infinite',
        'pulse-slow': 'pulse 3s ease-in-out infinite',
        'spin-slow': 'spin 8s linear infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        },
      },
      backgroundImage: {
        'floral-pattern': "url('/images/floral-bg.png')",
        'gold-gradient': 'linear-gradient(135deg, #C9A84C 0%, #E8D08A 50%, #C9A84C 100%)',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
