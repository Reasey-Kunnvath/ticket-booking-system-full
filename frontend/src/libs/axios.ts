import axios from 'axios'

const baseURL = 'http://localhost:8000/api/'

const api = axios.create({
  baseURL,
  headers: {
    // dak jg derm3 oy laravel throw friendly error
    Accept: 'application/json',
  },
})

api.interceptors.request.use((config) => {
  const token = localStorage.getItem('token')

  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

api.interceptors.response.use(
  (config) => config,
  (error) => {
    console.error('error :', error)
    return error
  },
)

export default api
