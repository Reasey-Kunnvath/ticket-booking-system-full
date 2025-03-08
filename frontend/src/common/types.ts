import type { LucideIcon } from 'lucide-vue-next'
import type { RouteRecordRaw } from 'vue-router'

export type TUser = {
  id: number
  name: string
  email: string
  email_verified_at: Date
  role_id: number
}

export type TLoginResponse = {
  success: boolean
  message: string
  data: {
    access_token: string
    user: TUser
  }
}

export type TBaseRouteProps = RouteRecordRaw & { label: string; icon: LucideIcon }

export type TDashboardLoginFormValue = {
  email: string
  password: string
}
