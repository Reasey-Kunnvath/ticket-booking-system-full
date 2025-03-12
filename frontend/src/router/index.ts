import { createRouter, createWebHistory } from 'vue-router'
import adminRoutes from './admin.route'
import eventProviderRoutes from './event-provider.route'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: () => import('../components/layout/dashboard/dashboard-layout.vue'),
      children: [
        {
          path: 'dashboard/admin',
          name: 'admin-route',
          children: adminRoutes,
        },
        {
          path: 'dashboard/event-provider',
          name: 'event-provider-route',
          children: eventProviderRoutes,
        },
      ],
      beforeEnter: (to, from, next) => {
        const token = localStorage.getItem('token')
        if (!token) {
          if (to.path.includes('admin')) {
            next('/admin/login')
          }
          next('/event-provider/login')
        } else {
          next()
        }
      },
    },
    {
      path: '/admin/login',
      name: 'admin-login',
      component: () => import('../views/dashboard/admin/login-page.vue'),
    },
    {
      path: '/event-provider/login',
      name: 'event-provider-login',
      component: () => import('../views/dashboard/event-provider/login-page.vue'),
    },
    {
      path: '/user/login',
      name: 'user-login',
      component: () => import('../views/user-side/auth/login-page.vue'),
    },
  ],
})

export default router
