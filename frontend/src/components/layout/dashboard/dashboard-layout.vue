<template>
  <div class="flex h-screen w-full bg-background text-foreground">
    <DashboardSidebar />
    <div class="flex flex-1 flex-col pl-0 md:pl-64">
      <DashboardHeader />
      <main class="p-4">
        <RouterView />
      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import DashboardHeader from './dashboard-header.vue'
import DashboardSidebar from './dashboard-sidebar.vue'
</script>

<style></style>
