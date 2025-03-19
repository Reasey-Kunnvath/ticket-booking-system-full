<template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="w-full max-w-md rounded-lg bg-background p-6 shadow-lg" @click.stop>
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold">Create New Role</h2>
        <button @click="$emit('close')" class="rounded-full p-1 hover:bg-muted">
          <X class="h-5 w-5" />
        </button>
      </div>

      <form @submit.prevent="handleSubmit" class="mt-4 space-y-4">
        <div class="space-y-2">
          <label for="name" class="text-sm font-medium">Name</label>
          <Input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="Enter role name"
            :class="{ 'border-destructive': errors.name }"
          />
          <p v-if="errors.name" class="text-xs text-destructive">{{ errors.name }}</p>
        </div>

        <div class="flex justify-end gap-2 pt-4">
          <button
            type="button"
            @click="$emit('close')"
            class="rounded-md border px-4 py-2 text-sm font-medium hover:bg-accent"
          >
            Cancel
          </button>
          <button
            type="submit"
            :disabled="isSubmitting"
            class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90 disabled:opacity-50 flex justify-center gap-2 items-center"
          >
            <Loader2 v-if="isSubmitting" class="mr-2 h-4 w-4 animate-spin" />
            Create Role
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { TBaseApiResponse, TRole } from '@/common/types'
import api from '@/lib/axios'
import { Loader2, X } from 'lucide-vue-next'
import { onMounted, reactive, ref } from 'vue'
import { Input } from '@/components/ui/input'
import { toast } from 'vue3-toastify'

defineProps<{
  show: boolean
}>()

const emit = defineEmits<{
  (e: 'close'): void
  (e: 'user-created'): void
}>()

const form = reactive({
  name: '',
  email: '',
  password: '',
  role_id: '',
  phone_number: '',
})

const errors = reactive({
  name: '',
  email: '',
  password: '',
  role_id: '',
  phone_number: '',
})

const roles = ref<TRole[]>([])

onMounted(async () => {
  const res = await api.get<TBaseApiResponse<TRole>>('v1/admin/roles')
  roles.value = res.data.data
})
const isSubmitting = ref(false)

const validateForm = () => {
  let isValid = true

  errors.name = ''
  errors.email = ''
  errors.password = ''
  errors.role_id = ''
  errors.phone_number = ''
  if (!form.name.trim()) {
    errors.name = 'Name is required'
    isValid = false
  }

  if (!form.email.trim()) {
    errors.email = 'Email is required'
    isValid = false
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
    errors.email = 'Please enter a valid email address'
    isValid = false
  }

  if (!form.password) {
    errors.password = 'Password is required'
    isValid = false
  } else if (form.password.length < 6) {
    errors.password = 'Password must be at least 6 characters'
    isValid = false
  }

  if (!form.role_id) {
    errors.role_id = 'Please select a role'
    isValid = false
  }

  return isValid
}

const resetForm = () => {
  form.name = ''
  form.email = ''
  form.password = ''
  form.role_id = ''
}

const handleSubmit = async () => {
  if (!validateForm()) return

  isSubmitting.value = true

  try {
    await api.post('v1/admin/users', form)

    resetForm()

    toast.success('User created successfully')

    // Notify parent component
    emit('user-created')
  } catch (error) {
    console.error('Error creating user:', error)
  } finally {
    isSubmitting.value = false
  }
}
</script>
