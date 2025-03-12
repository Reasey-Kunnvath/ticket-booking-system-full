<template>
  <header class="sticky top-0 z-10 flex h-14 items-center border-b bg-background px-4">
    <div class="relative w-full max-w-sm">
      <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
      <input
        type="text"
        placeholder="Search"
        class="h-9 w-full rounded-md border border-input bg-background pl-8 pr-4 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
      />
      <div class="absolute right-1 top-1 flex items-center">
        <kbd
          class="pointer-events-none inline-flex h-7 select-none items-center gap-1 rounded border bg-muted px-1.5 font-mono text-[10px] font-medium text-muted-foreground opacity-100"
        >
          <span class="text-xs">⌘</span>K
        </kbd>
      </div>
    </div>

    <div class="ml-auto flex items-center gap-4">
      <button class="rounded-full p-1 hover:bg-accent">
        <Sun class="h-5 w-5" />
      </button>
      <button class="rounded-full p-1 hover:bg-accent">
        <Bell class="h-5 w-5" />
      </button>
      <AvatarPf />
      <Button variant="destructive" size="sm" @click="onLogout">
        <LogOut />
        Logout
      </Button>
    </div>
  </header>
</template>

<script setup lang="ts">
import { ROLE } from '@/common/constants/default.const'
import { handleLogout } from '@/common/helper/auth.helper'
import AvatarPf from '@/components/custom-ui/avatar-pf.vue'
import Button from '@/components/ui/button/Button.vue'
import useAuth from '@/stores/user.context'
import { Bell, LogOut, Search, Sun } from 'lucide-vue-next'
import { useRouter } from 'vue-router'

const { user } = useAuth()
const router = useRouter()

function onLogout() {
  handleLogout()
  if (user?.role_id === ROLE.ADMIN) {
    router.push('/admin/login')
  } else {
    router.push('/event-provider/login')
  }
}
</script>
