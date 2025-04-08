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
                    "/admin/login",
                ];

                if (guestRoute.includes(window.location.pathname)) {
                    return;
                }

                if (
                    !localStorage.getItem("isLoggedIn") &&
                    !localStorage.getItem("token")
                ) {
                    window.location.href = "/login";
                }
            },
        },
    });
});
