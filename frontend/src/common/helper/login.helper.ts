import api from '@/libs/axios'
import type { TLoginResponse } from '../types'
import { useRouter } from 'vue-router'

export async function handleLogin(endpoint: string, payload: { email: string; password: string }) {
  const { data } = await api.post<TLoginResponse>(endpoint, payload)

  const router = useRouter()

  if (data?.access_token) {
    localStorage.setItem('token', data.access_token)
    router.push('/admin')
  }

  return data
}
