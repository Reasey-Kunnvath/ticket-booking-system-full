<template>
  <p>admin dashboard</p>
  <p>current logged in user: {{ userContext.user?.email }}</p>
  <p v-if="userContext.user?.role_id">user role: {{ ROLE_NAME[userContext.user.role_id] }}</p>
</template>

<script setup lang="ts">
import useUserContext from '@/stores/user.context'
import { ROLE_NAME } from '@/common/constants/default.const'

const userContext = useUserContext()
</script>
