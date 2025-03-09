import type { LucideIcon } from 'lucide-vue-next'
import type { RouteRecordRaw } from 'vue-router'

export type TRole = {
  id: number
  role_name: string
  created_at: Date | null
  updated_at: Date | null
}

export type TUser = {
  id: number
  name: string
  email: string
  email_verified_at: string
  phone_number: string
  role_id: number
  created_at: Date
  updated_at: Date
}

export type TUserList = TUser & {
  role: TRole
}

export type TLoginResponse = {
  success: boolean
  message: string
  data: {
    access_token: string
    user: TUserList
  }
}

export type TBaseRouteProps = RouteRecordRaw & { label: string; icon: LucideIcon }

export type TDashboardLoginFormValue = {
  email: string
  password: string
}

export type TBaseApiResponse<T> = {
  success: boolean
  message: string
  data: T[]
}
