module.exports = {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
    theme: {
        extend: {},
    },
    darkMode: "class",
    flyonui: {
        themes: [
            "light", // Default light theme
            "dark", // Default dark theme
        ],
    },
    plugins: [
        require("flyonui"),
        require("flyonui/plugin"),
        require("@iconify/tailwind4"),
    ],
};
