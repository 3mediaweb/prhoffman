module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    fontFamily: {
      'sans': ['"Open Sans"', 'sans-serif'],
    },
    extend: {
      colors: {
        'blue-primary': '#0D3691',
        blue: {
          300: '#00B8F1',
          400: '#0075b4',
          800: '#182957',
        },
        gray: {
          300: '#F1F0F0',
          600: '#7A7C7D',
          900: '#000103',
        },
        coral: '#00AEEF',
        purple: '#153D93',
      },
      screens: {
        'nav': '1430px',
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
  ],
};
