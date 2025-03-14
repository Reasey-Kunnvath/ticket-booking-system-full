import { handleLogout } from '@/common/helper/auth.helper'
import axios from 'axios'
import { toast } from 'vue3-toastify'

const baseURL = 'http://localhost:8000/api/'

const api = axios.create({
  baseURL,
  headers: {
    // dak  derm3 oy laravel throw friendly error
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
  (response) => {
    return response
  },
  (error) => {
    console.log(error)
    handleErrorResponse(error)
    return Promise.reject(error)
  },
)

// eslint-disable-next-line @typescript-eslint/no-explicit-any
const handleErrorResponse = async (error: any) => {
  let errorMessage = 'An unexpected error occurred.'

  if (error.response) {
    const responseData = error.response.data

    if (responseData && responseData.errors) {
      if (typeof responseData.errors === 'object') {
        const firstError = Object.values(responseData.errors)
          .flat()
          .find((err) => typeof err === 'string')
        errorMessage = firstError || errorMessage
      }
    } else if (responseData && typeof responseData.message === 'string') {
      errorMessage = responseData.message
    }
  }

  toast.error(errorMessage, {
    position: 'top-right',
    // 5 seconds
    autoClose: 5000,
  })

  if (error?.response?.status === 401) {
    // jam 3 seconds before redirect tv login page
    await new Promise((resolve) => setTimeout(resolve, 2000))

    window.location.href = '/admin/login'
    handleLogout()
  }
}

export default api
