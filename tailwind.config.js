/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {},
        fontFamily: {
            openSans: ["Open Sans"],
        },
    },
    plugins: [require("flowbite/plugin")],
};
