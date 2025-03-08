<template>
  <div
    class="flex min-h-screen items-center justify-center bg-background px-4 py-12 sm:px-6 lg:px-8"
  >
    <div class="w-full max-w-md space-y-8">
      <div class="text-center">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-primary">
          <Lock class="h-6 w-6 text-primary-foreground" />
        </div>
        <h2 class="mt-6 text-3xl font-bold tracking-tight">{{ title }}</h2>
      </div>

      <form class="mt-8 space-y-6" @submit.prevent="onFormSubmit">
        <div class="space-y-4 rounded-md">
          <div>
            <label for="email" class="block text-sm font-medium"> Email address </label>
            <div class="mt-1">
              <input
                id="email"
                v-model="form.email"
                name="email"
                type="email"
                autocomplete="email"
                class="block w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
                :class="{ 'border-destructive focus-visible:ring-destructive': errors.email }"
                placeholder="name@example.com"
              />
              <p v-if="errors.email" class="mt-1 text-sm text-destructive">
                {{ errors.email }}
              </p>
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium"> Password </label>
              <a href="#" class="text-sm font-medium text-primary hover:text-primary/90">
                Forgot password?
              </a>
            </div>
            <div class="mt-1 relative">
              <input
                id="password"
                v-model="form.password"
                :type="showPassword ? 'text' : 'password'"
                name="password"
                autocomplete="current-password"
                class="block w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring pr-10"
                :class="{ 'border-destructive focus-visible:ring-destructive': errors.password }"
                placeholder="••••••••"
              />
              <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute inset-y-0 right-0 flex items-center pr-3"
              >
                <Eye v-if="!showPassword" class="h-4 w-4 text-muted-foreground" />
                <EyeOff v-else class="h-4 w-4 text-muted-foreground" />
              </button>
              <p v-if="errors.password" class="mt-1 text-sm text-destructive">
                {{ errors.password }}
              </p>
            </div>
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <input
              id="remember-me"
              v-model="form.rememberMe"
              name="remember-me"
              type="checkbox"
              class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary"
            />
            <label for="remember-me" class="ml-2 block text-sm text-muted-foreground">
              Remember me
            </label>
          </div>
        </div>

        <!-- Submit Button -->
        <div>
          <button
            type="submit"
            :disabled="isSubmitting"
            class="flex w-full justify-center rounded-md bg-primary px-3 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <Loader2 v-if="isSubmitting" class="mr-2 h-4 w-4 animate-spin" />
            {{ isSubmitting ? 'Signing in...' : 'Sign in' }}
          </button>
        </div>

        <!-- Form Errors -->
        <div v-if="formError" class="rounded-md bg-destructive/15 p-4">
          <div class="flex">
            <AlertCircle class="h-5 w-5 text-destructive" />
            <div class="ml-3">
              <h3 class="text-sm font-medium text-destructive">Error</h3>
              <div class="mt-2 text-sm text-destructive">
                <p>{{ formError }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Social Login -->
        <div class="mt-6">
          <div class="relative">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-muted"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="bg-background px-2 text-muted-foreground"> Or continue with </span>
            </div>
          </div>

          <div class="mt-6 grid grid-cols-2 gap-3">
            <button
              type="button"
              class="flex w-full items-center justify-center gap-2 rounded-md border border-input bg-background px-3 py-2 text-sm font-medium hover:bg-accent"
            >
              <Github class="h-4 w-4" />
              <span>GitHub</span>
            </button>
            <button
              type="button"
              class="flex w-full items-center justify-center gap-2 rounded-md border border-input bg-background px-3 py-2 text-sm font-medium hover:bg-accent"
            >
              <Mail class="h-4 w-4" />
              <span>Google</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { dashboardLoginSchema } from '@/common/schema'
import type { TDashboardLoginFormValue } from '@/common/types'
import { AlertCircle, Eye, EyeOff, Github, Loader2, Lock, Mail } from 'lucide-vue-next'
import { reactive, ref, type PropType } from 'vue'
import { z } from 'zod'

const props = defineProps({
  handleSubmit: {
    type: Function as PropType<(value: TDashboardLoginFormValue) => void>,
    required: true,
  },
  loading: {
    type: Boolean,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  defaultEmail: {
    type: String,
  },
  defaultPassword: {
    type: String,
  },
})

const form = reactive({
  email: props.defaultEmail || '',
  password: props.defaultPassword || '',
  rememberMe: false,
})

const showPassword = ref(false)
const isSubmitting = ref(false)
const formError = ref('')
const errors = reactive({
  email: '',
  password: '',
})

const clearErrors = () => {
  errors.email = ''
  errors.password = ''
  formError.value = ''
}

const onFormSubmit = async () => {
  clearErrors()

  try {
    dashboardLoginSchema.parse(form)
    isSubmitting.value = true
    await props.handleSubmit(form)
  } catch (error) {
    if (error instanceof z.ZodError) {
      error.errors.forEach((err) => {
        const path = err.path[0]
        const message = err.message
        errors[path as keyof typeof errors] = message
      })
    } else {
      formError.value = 'An unexpected error occurred. Please try again.'
      console.error(error)
    }
  } finally {
    isSubmitting.value = false
  }
}
</script>
