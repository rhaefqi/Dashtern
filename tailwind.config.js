export default {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
    },
  },
  content: [
    "./resources/*.blade.php",
    "./resources/**.blade.php",
    "./resources/**/*.blade.php",
    "./resources/**/*/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", // jika pakai Vue
  ],
}
