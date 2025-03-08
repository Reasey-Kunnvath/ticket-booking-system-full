import { z } from 'zod'

export const dashboardLoginSchema = z.object({
  email: z.string().email(),
  password: z.string().min(8),
})

export type TDashboardLoginFormValue = z.infer<typeof dashboardLoginSchema>
