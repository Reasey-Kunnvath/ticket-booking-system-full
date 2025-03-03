import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin/login',
      name: 'admin-login',
      component: () => import('../views/admin/AdminLogin.vue'),
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/admin/AdminLayout.vue'),
      children: [
        {
          path: '/asdfasdf',
          name: 'admin-home',
          component: () => import('../views/admin/AdminHome.vue'),
        },
      ],
      beforeEnter: () => {
        const token = localStorage.getItem('token')
        if (!token) {
          return { name: 'admin-login' }
        }
      },
    },
  ],
})

export default router
