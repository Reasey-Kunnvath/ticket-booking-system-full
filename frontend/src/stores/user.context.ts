import { reactive } from 'vue'
import type { TUser } from '@/common/types'

const user = localStorage.getItem('user')

export const userContext = reactive({
  user: (user ? JSON.parse(user!) : null) as TUser | null,
  setUser: (userData: TUser) => {
    userContext.user = userData
    localStorage.setItem('user', JSON.stringify(userData))
  },
  clearUser: () => {
    userContext.user = null
    localStorage.removeItem('user')
  },
})

const useAuth = () => {
  return userContext
}

export default useAuth
