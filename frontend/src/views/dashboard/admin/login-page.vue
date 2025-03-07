<script setup lang="ts">
import { handleLogin } from '@/common/helper/auth.helper'
import type { TDashboardLoginFormValue } from '@/common/types'
import LoginForm from '@/components/custom-ui/form/login-form.vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)

const handleSubmit = async (value: TDashboardLoginFormValue) => {
  loading.value = true
  const { success } = await handleLogin('/admin/login', value)
  if (success) {
    router.push('/dashboard/admin')
  }
  loading.value = false
}
</script>

<template>
  <LoginForm
    :handleSubmit="handleSubmit"
    :loading="loading"
    title="Admin Login"
    defaultEmail="admin@admin.com"
    defaultPassword="12345678"
  />
</template>
