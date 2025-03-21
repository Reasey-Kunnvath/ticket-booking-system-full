<template>
  <div
    class="fixed inset-y-0 z-20 flex w-64 flex-col border-r bg-sidebar text-sidebar-foreground transition-all duration-300 ease-in-out"
  >
    <div class="flex h-14 items-center border-b px-4">
      <div class="flex items-center gap-2">
        <div class="flex h-8 w-8 items-center justify-center rounded-md bg-black text-white">
          <div class="text-lg font-bold">S</div>
        </div>
        <div>
          <div class="text-sm font-semibold">Ticket Management</div>
          <div class="text-xs text-muted-foreground">Admin Dashboard</div>
        </div>
      </div>
    </div>

    <div class="flex-1 overflow-auto py-2">
      <div class="px-3 py-2">
        <h3 class="mb-2 text-xs font-medium uppercase text-muted-foreground">General</h3>
        <ul class="space-y-1">
          <li class="nav-item" v-for="route in displayRoutes" :key="route.path">
            <RouterLink
              v-if="!route.children"
              :to="route.path"
              :class="[
                'flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium',
                router?.path === route.path
                  ? 'bg-accent text-accent-foreground'
                  : 'hover:bg-accent/50',
              ]"
            >
              <component :is="route.icon" class="h-4 w-4" />
              <span>{{ route.label }}</span>
            </RouterLink>

            <!-- Collapsible item (e.g., User & Role) -->
            <Collapsible v-else v-model:open="openStates[route.path]">
              <CollapsibleTrigger as-child>
                <div
                  class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium hover:bg-accent/50 cursor-pointer"
                >
                  <component :is="route.icon" class="h-4 w-4" />
                  <span>{{ route.label }}</span>
                  <ChevronRight v-if="!openStates[route.path]" class="ml-auto h-4 w-4" />
                  <ChevronDown v-else class="ml-auto h-4 w-4" />
                </div>
              </CollapsibleTrigger>
              <CollapsibleContent
                class="data-[state=open]:animate-collapsible-down data-[state=closed]:animate-collapsible-up"
              >
                <ul class="ml-6 mt-2 space-y-1">
                  <li v-for="child in route?.children" :key="child.path">
                    <RouterLink
                      :to="child.path ? `${route.path}/${child.path}` : route.path"
                      :class="[
                        'flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium',
                        router?.path === (child.path ? `${route.path}/${child.path}` : route.path)
                          ? 'bg-accent text-accent-foreground'
                          : 'hover:bg-accent/50',
                      ]"
                    >
                      <component v-if="child?.icon" :is="child.icon" class="h-4 w-4" />
                      <span>{{ child.label }}</span>
                    </RouterLink>
                  </li>
                </ul>
              </CollapsibleContent>
            </Collapsible>
          </li>
        </ul>
      </div>

      <div class="mt-4 px-3 py-2">
        <h3 class="mb-2 text-xs font-medium uppercase text-muted-foreground">Other</h3>
        <ul class="space-y-1">
          <li>
            <a
              href="#"
              class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium hover:bg-accent/50"
            >
              <Settings class="h-4 w-4" />
              <span>Settings</span>
              <ChevronRight class="ml-auto h-4 w-4" />
            </a>
          </li>
          <li>
            <a
              href="#"
              class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium hover:bg-accent/50"
            >
              <HelpCircle class="h-4 w-4" />
              <span>Help Center</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="mt-auto border-t p-4">
      <div class="flex items-center gap-3">
        <AvatarPf />
        <div>
          <p class="text-sm font-medium">{{ user?.name || '' }}</p>
          <p class="text-xs text-muted-foreground">{{ user?.email || '' }}</p>
        </div>
        <button class="ml-auto rounded-full p-1 hover:bg-accent">
          <ChevronDown class="h-4 w-4" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ROLE } from '@/common/constants/default.const'
import type { TBaseRouteProps } from '@/common/types'
import AvatarPf from '@/components/custom-ui/avatar-pf.vue'
import adminRoutes from '@/router/admin.route'
import eventProviderRoutes from '@/router/event-provider.route'
import useAuth, { userContext } from '@/stores/user.context'
import { Collapsible, CollapsibleTrigger, CollapsibleContent } from '@/components/ui/collapsible'
import { ChevronDown, ChevronRight, HelpCircle, Settings } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'

const router = useRoute()
const { user } = useAuth()
const userRole = userContext.user?.role_id

const displayRoutes = ref<TBaseRouteProps[]>([])
const openStates = ref<{ [key: string]: boolean }>({})

onMounted(() => {
  if (userRole === ROLE.ADMIN) {
    displayRoutes.value = adminRoutes
  } else if (userRole === ROLE.EVENT_PROVIDER) {
    displayRoutes.value = eventProviderRoutes
  }

  // Initialize openStates for routes with children
  displayRoutes.value.forEach((route) => {
    if (route.children) {
      openStates.value[route.path] = false // Initially closed
    }
  })
})
</script>
