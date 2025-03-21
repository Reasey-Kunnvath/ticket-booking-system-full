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

type TUserWithRole = TUser & {
  role: TRole
}

export type TUserList = {
  data: TUserWithRole[]
}

export type TLoginResponse = {
  success: boolean
  message: string
  data: {
    access_token: string
    user: TUser
  }
}

export type TRoute = Omit<RouteRecordRaw, 'children'> & { label: string; icon: LucideIcon }
export type TBaseRouteProps = TRoute & {
  children?: TRoute[]
}

export type TDashboardLoginFormValue = {
  email: string
  password: string
}

export type TBaseApiResponse<T> = {
  success: boolean
  message: string
  data: T
}
