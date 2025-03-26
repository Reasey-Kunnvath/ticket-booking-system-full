import "./bootstrap";
import "flyonui/flyonui.js";
import "flyonui/dist/accordion.js";
import { themeChange } from "theme-change";
themeChange();

// Initialize HSCollapse manually to ensure it runs after the DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
    if (typeof HSCollapse !== "undefined") {
        HSCollapse.autoInit();
    } else {
        console.error(
            "HSCollapse is not defined. Check if FlyonUI JavaScript is loaded correctly."
        );
    }
});

// document.addEventListener("DOMContentLoaded", () => {
//     const themeToggle = document.getElementById("theme-toggle");
//     const sunIcon = document.getElementById("sun-icon");
//     const moonIcon = document.getElementById("moon-icon");
//     const html = document.documentElement;

//     // Set initial icon state
//     const isDark = localStorage.getItem("theme") === "dark";
//     sunIcon.classList.toggle("hidden", !isDark);
//     moonIcon.classList.toggle("hidden", isDark);

//     // Toggle theme on button click
//     themeToggle.addEventListener("click", () => {
//         if (html.classList.contains("dark")) {
//             html.classList.remove("dark");
//             localStorage.setItem("theme", "light");
//             sunIcon.classList.add("hidden");
//             moonIcon.classList.remove("hidden");
//         } else {
//             html.classList.add("dark");
//             localStorage.setItem("theme", "dark");
//             sunIcon.classList.remove("hidden");
//             moonIcon.classList.add("hidden");
//         }
//         document.body.offsetHeight; // Force reflow
//         console.log(localStorage.getItem("theme"));
//     });
// });
