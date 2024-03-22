/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        colors: {
            primary: "#FF7417",
            grecianblue: "#2988BC",
            sea: "#2f496E",
            plaster: "#F4EADE",
            coral: "#ED8C72",
            black: "#000000",
            white: "#FFFFFF",
            softblue: "#F2FBFF",
        },
        fontFamily: {
            sans: ["Century Gothic", "sans-serif"],
        },
    },
    plugins: [
        require("preline/plugin"),
        require("flowbite/plugin"),
    ],
};
