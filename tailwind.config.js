/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./views/**/*.php",
    "./auth/**/*.php",
    "./config/**/*.php",
    "./controllers/**/*.php",
    "./assets/js/**/*.js",
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "primary": "#132043",
        "secondary": "#8d8d8d",
        "light-red": "#D45858",
        "light-yellow": "#DCD52A",
        "secure": "#557ADD",
        "danger": "#FF0000",
        "logo-color": "#4770D9",
        "color-bg": "#F5F5FF",
        "color-hover": "#213876",
        "dark-primary": "#1F1F1F",
        "dark-scondary": "#151515",
        "dark-third": "#3C415C",
        "dark-fourth": "#B4A5A5",
        "dark-five": "#1A1A2E",
        "green": "#FFA500",
      },
      fontFamily: {
        "Poppins": "Poppins"
      },
      keyframes: {
        scaleIn: {
          '0%': { transform: 'scale(0)' },
          '100%': { transform: 'scale(1)' },
        },
      },
      animation: {
        'scale-in': 'scaleIn 0.2s ease-in-out',
      },
    },
  },
  plugins: [],
};
