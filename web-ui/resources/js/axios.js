import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

const token = localStorage.getItem("token");
if (token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
}

console.log("Token: ", token);

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
