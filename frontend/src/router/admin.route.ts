import type { TBaseRouteProps } from '@/common/types'
import { LayoutDashboard, Users } from 'lucide-vue-next'

const adminRoutes: TBaseRouteProps[] = [
  {
    path: '/dashboard/admin',
    component: () => import('../views/dashboard/admin/dashboard-page/dashboard-home.vue'),
    label: 'Dashboard',
    icon: LayoutDashboard,
  },
  {
    path: '/dashboard/admin/users',
    component: () => import('../views/dashboard/admin/users/users-page.vue'),
    label: 'User',
    icon: Users,
  },
]

export default adminRoutes
