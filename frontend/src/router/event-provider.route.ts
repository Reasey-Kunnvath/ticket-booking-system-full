import type { TBaseRouteProps } from '@/common/types'

const eventProviderRoutes: TBaseRouteProps[] = [
  {
    path: '/dashboard/event-provider',
    name: 'event-provider-dashboard',
    component: () => import('@/views/dashboard/event-provider/dashboard-page.vue'),
    label: 'Dashboard',
    icon: 'bx bx-home',
  },
  {
    path: '/dashboard/event-provider/event',
    name: 'event-provider-dashboard-event',
    component: () => import('@/views/dashboard/event-provider/event-page.vue'),
    label: 'Event',
    icon: 'bx bx-home',
  },
]

export default eventProviderRoutes
