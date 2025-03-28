// resources/js/auth-check.js
document.addEventListener("DOMContentLoaded", () => {
    new Vue({
        el: "#app",
        mounted() {
            this.loggedInStatus();
        },
        methods: {
            loggedInStatus() {
                const guestRoute = [
                    "/",
                    "/all-event",
                    "/concert",
                    "/conference",
                    "/sport",
                    "/about",
                    "/sell-your-ticket",
                    "/upcoming-event",
                    "/most-popular-event",
                    "/event-detail",
                    "/help-center",
                ];

                if (guestRoute.includes(window.location.pathname)) {
                    return;
                }

                if (!localStorage.getItem("isLoggedIn")) {
                    window.location.href = "/login";
                }
            },
        },
    });
});
