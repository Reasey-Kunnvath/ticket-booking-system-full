import api from '@/lib/axios'
import { userContext } from '@/stores/user.context'
import type { TLoginResponse, TUser } from '../types'

export async function handleLogin(endpoint: string, payload: { email: string; password: string }) {
  try {
    const { data } = await api.post<TLoginResponse>(endpoint, payload)

    if (data?.data?.access_token) {
      localStorage.setItem('token', data.data.access_token)

      const user: TUser = data.data.user

      userContext.setUser(user)

      return { success: true }
    }
    return { success: false }
  } catch (error) {
    console.error('Login error:', error)
    return { success: false }
  }
}

export async function handleLogout() {
  localStorage.clear()
  userContext.clearUser()
}
