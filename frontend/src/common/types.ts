type TUser = {
  id: number
  name: string
  email: string
  email_verified_at: Date
  role_id: number
}

export type TLoginResponse = {
  access_token: string | null
  user: TUser | null
  message: string
}
