import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

const token = localStorage.getItem("token");
if (token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
}

axios.defaults.headers.post["Content-Type"] = "application/json";

const publicRoutes = [
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
];

axios.interceptors.response.use(
    (config) => config,
    (error) => {
        if (
            error.response &&
            error.response.status === 401 &&
            !publicRoutes.some((route) => error.config.url.includes(route))
        ) {
            localStorage.removeItem("token");
            window.location.href = "/login";
        }
        return Promise.reject(error);
    }
);

window.axios = axios;
export default axios;
