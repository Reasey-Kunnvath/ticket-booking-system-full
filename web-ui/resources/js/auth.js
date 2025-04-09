// resources/js/app.js
document.addEventListener("DOMContentLoaded", () => {
    new Vue({
        el: "#app",
        data: {
            guestRoute: [
                "/",
                "/all-event",
                "/concert",
                "/conference",
                "/sport",
                "/about",
                "/sell-your-ticket",
                "/upcoming-event",
                "/most-popular-event",
                "/event-detail/" + { id },
                "/help-center",
                "/admin/login",
            ],
        },
        created() {
            this.loggedInStatus(); // Runs client-side, but middleware already handled it
        },
        methods: {
            loggedInStatus() {
                const isLoggedIn =
                    localStorage.getItem("isLoggedIn") &&
                    localStorage.getItem("token");
                const currentPath = window.location.pathname;

                if (isLoggedIn || this.guestRoute.includes(currentPath)) {
                    return; // Allow if logged in or in guest routes
                }

                window.location.href = "/login"; // Fallback (unlikely to trigger)
            },
        },
    });
});
