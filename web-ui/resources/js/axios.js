import axios from "axios";

// Set the base URL to your Laravel app
axios.defaults.baseURL = "http://127.0.0.1:8000/api";

// Include CSRF token (if using Laravel's default CSRF protection)
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

window.axios = axios;

export default axios;
