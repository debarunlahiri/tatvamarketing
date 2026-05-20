module.exports = {
  content: {
    relative: true,
    files: [
      './*.php',
      './includes/*.php'
    ]
  },
  theme: {
    extend: {
      colors: {
        ink: '#101828',
        steel: '#334155',
        line: '#e2e8f0',
        brand: {
          DEFAULT: '#510400',
          dark: '#3f0300',
          soft: '#f8e9e7',
          muted: '#ead0cc',
          light: '#ffd9d4'
        },
        accent: '#510400'
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif']
      }
    }
  }
};
