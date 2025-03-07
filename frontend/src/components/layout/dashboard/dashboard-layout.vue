<script setup lang="ts">
import { RouterView } from 'vue-router'
import DashboardHeader from './dashboard-header.vue'
import DashboardNavbar from './dashboard-navbar.vue'
</script>

<template>
  <DashboardHeader />
  <DashboardNavbar />
  <main id="main" class="main">
    <RouterView />
  </main>
</template>
