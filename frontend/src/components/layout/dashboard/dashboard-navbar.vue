<script setup lang="ts">
import { ROLE } from '@/common/constants/default.const'
import type { TBaseRouteProps } from '@/common/types'
import adminRoutes from '@/router/admin.route'
import eventProviderRoutes from '@/router/event-provider.route'
import { userContext } from '@/stores/user.context'
import { onMounted, ref } from 'vue'
import { RouterLink } from 'vue-router'

const userRole = userContext.user?.role_id

const displayRoutes = ref<TBaseRouteProps[]>([])

onMounted(() => {
  if (userRole === ROLE.ADMIN) {
    displayRoutes.value = adminRoutes
  } else if (userRole === ROLE.EVENT_PROVIDER) {
    displayRoutes.value = eventProviderRoutes
  }
})
</script>

<template>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item" v-for="route in displayRoutes" :key="route.path">
        <RouterLink
          :to="route.path"
          class="nav-link"
          :class="{ active: route.path === $route.path }"
        >
          <i
            :class="route.icon"
            :style="{ color: route.path === $route.path ? 'white' : undefined }"
          ></i>
          <span>{{ route.label }}</span>
        </RouterLink>
      </li>
    </ul>
  </aside>
</template>
