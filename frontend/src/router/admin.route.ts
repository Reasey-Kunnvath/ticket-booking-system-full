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
    path: '/dashboard/admin/event-provider',
    component: () => import('../views/dashboard/admin/event-provider-page.vue'),
    label: 'Event Provider',
    icon: Users,
  },
]

export default adminRoutes
