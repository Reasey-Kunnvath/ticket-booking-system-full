<script setup lang="ts">
import { RouterView } from 'vue-router'
import { userContext } from '@/stores/user.context'
import { provide } from 'vue'

// register context nov nis to share across entire app
provide('userContext', userContext)
</script>

<template>
  <RouterView />
</template>

<style scoped></style>
