import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

if (localStorage.getItem("token")) {
    axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("token");
}

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

axios.defaults.headers.post["Content-Type"] = "application/json";

axios.interceptors.response.use(
    (config) => config,
    (error) => {
        if (error.response.status === 401) {
            localStorage.removeItem("token");
            window.location.href = "/login";
        }
    }
);

window.axios = axios;
export default axios;
