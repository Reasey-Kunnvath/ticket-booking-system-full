import type { TBaseRouteProps } from '@/common/types'
import { LayoutDashboard, Users, ShieldUser,TicketCheck } from 'lucide-vue-next'

const adminRoutes: TBaseRouteProps[] = [
  {
    path: '/dashboard/admin',
    component: () => import('../views/dashboard/admin/dashboard-page/dashboard-home.vue'),
    label: 'Dashboard',
    icon: LayoutDashboard,
  },
  {
    path: '/dashboard/admin', // Parent route (not directly navigable)
    label: 'User & Role',
    icon: Users,
    children: [
      {
        path: 'users', // This becomes /dashboard/admin/users-roles/users
        component: () => import('../views/dashboard/admin/users/users-page.vue'),
        label: 'User Management',
        icon: Users,
      },
      {
        path: 'roles', // This becomes /dashboard/admin/users-roles/roles
        component: () => import('../views/dashboard/admin/roles/roles-page.vue'),
        label: 'Role Management',
        icon: ShieldUser,
      },

    ],

  },
  {
    path: '/dashboard/admin/order',
    component: () => import('../views/dashboard/admin/order-page/order-page.vue'),
    label: 'Order',
    icon: TicketCheck,
  },

]

export default adminRoutes
