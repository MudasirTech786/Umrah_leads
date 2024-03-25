/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            backgroundImage: {
                "home-banner": "url('images/home/hero-bg.png')",
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: "#040404",
            white: "#ffffff",
            gray1: "#c1c1c1",
            gray2: "#7a7a7a",
            first: "#AE3234",
            second: "#2a2a2a",
        },
    },
    plugins: [require("flowbite/plugin")],
};
