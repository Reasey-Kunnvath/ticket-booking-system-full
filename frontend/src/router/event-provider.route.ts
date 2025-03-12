import type { TBaseRouteProps } from '@/common/types'
import { LayoutDashboard, LucidePartyPopper } from 'lucide-vue-next'

const eventProviderRoutes: TBaseRouteProps[] = [
  {
    path: '/dashboard/event-provider',
    name: 'event-provider-dashboard',
    component: () => import('@/views/dashboard/event-provider/dashboard-page.vue'),
    label: 'Dashboard',
    icon: LayoutDashboard,
  },
  {
    path: '/dashboard/event-provider/event',
    name: 'event-provider-dashboard-event',
    component: () => import('@/views/dashboard/event-provider/event-page.vue'),
    label: 'Event',
    icon: LucidePartyPopper,
  },
]

export default eventProviderRoutes
