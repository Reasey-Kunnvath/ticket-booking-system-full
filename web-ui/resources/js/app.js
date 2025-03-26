import "./bootstrap";
import "flyonui/flyonui.js";
import "flyonui/dist/accordion.js";
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
