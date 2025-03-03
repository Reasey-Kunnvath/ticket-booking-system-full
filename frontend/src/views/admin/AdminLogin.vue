<template>
  <div class="about">
    <p>This is an admin login page</p>

    <form @submit="handleSubmit">
      <p v-if="errMsg" style="color: red">{{ errMsg }}</p>
      <input type="text" placeholder="email" v-model="form.email" />
      <input type="text" placeholder="password" v-model="form.password" />
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script setup lang="ts">
import { handleLogin } from '@/common/helper/login.helper'
import { ref } from 'vue'

const form = ref({
  email: '',
  password: '',
})

const errMsg = ref('')

const handleSubmit = async (e: Event) => {
  e.preventDefault()

  const { message, access_token } = await handleLogin('admin/login', form.value)

  console.log(message)

  // if error
  if (!access_token) {
    errMsg.value = message
  }
}
</script>
vu
