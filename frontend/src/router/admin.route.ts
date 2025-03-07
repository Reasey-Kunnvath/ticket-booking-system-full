import type { TBaseRouteProps } from '@/common/types'

const adminRoutes: TBaseRouteProps[] = [
  {
    path: '/dashboard/admin',
    component: () => import('../views/dashboard/admin/dashboard-page.vue'),
    label: 'Dashboard',
    icon: 'fas fa-tachometer-alt',
  },
  {
    path: '/dashboard/admin/event-provider',
    component: () => import('../views/dashboard/admin/event-provider-page.vue'),
    label: 'Event Provider',
    icon: 'fas fa-users',
  },
]

export default adminRoutes
