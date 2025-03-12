<script setup lang="ts">
import { handleLogin } from '@/common/helper/auth.helper'
import type { TDashboardLoginFormValue } from '@/common/types'
import LoginForm from '@/components/custom-ui/form/user-login-form.vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)

const handleSubmit = async (value: TDashboardLoginFormValue) => {
  loading.value = true
  const { success } = await handleLogin('/user/login', value)
  if (success) {
    router.push('/user-side/auth')
  }
  loading.value = false
}
</script>

<template>
  <LoginForm
    :handleSubmit="handleSubmit"
    :loading="loading"
    titleSignup="User Signup"
    titleLogin="User Login"
    defaultEmailLogin="user@user.com"
    defaultPasswordLogin="12345678"
  />
</template>
