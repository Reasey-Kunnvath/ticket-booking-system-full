<!-- <template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="w-full max-w-md rounded-lg bg-background p-6 shadow-lg" @click.stop>
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold">Edit User</h2>
        <button @click="$emit('close')" class="rounded-full p-1 hover:bg-muted">
          <X class="h-5 w-5" />
        </button>
      </div>

      <form @submit.prevent="handleSubmit" class="mt-4 space-y-4">
        <div class="space-y-2">
          <label for="name" class="text-sm font-medium">Name</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            placeholder="Enter user name"
            :class="{ 'border-destructive': errors.name }"
          />
          <p v-if="errors.name" class="text-xs text-destructive">{{ errors.name }}</p>
        </div>

        <div class="space-y-2">
          <label for="email" class="text-sm font-medium">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            placeholder="Enter email address"
            :class="{ 'border-destructive': errors.email }"
          />
          <p v-if="errors.email" class="text-xs text-destructive">{{ errors.email }}</p>
        </div>

        <div class="space-y-2">
          <label for="phone_number" class="text-sm font-medium">Phone Number</label>
          <input
            id="phone_number"
            v-model="form.phone_number"
            type="text"
            placeholder="Enter user phone number"
            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            :class="{ 'border-destructive': errors.phone_number }"
          />
          <p v-if="errors.phone_number" class="text-xs text-destructive">
            {{ errors.phone_number }}
          </p>
        </div>

        <div class="space-y-2">
          <label for="role" class="text-sm font-medium">Role</label>
          <select
            id="role"
            v-model="form.role_id"
            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            :class="{ 'border-destructive': errors.role_id }"
          >
            <option value="" disabled>Select a role</option>
            <option v-for="(roleName, roleId) in ROLE_NAME" :key="roleId" :value="roleId">
              {{ roleName }}
            </option>
          </select>
          <p v-if="errors.role_id" class="text-xs text-destructive">{{ errors.role_id }}</p>
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
            class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90 disabled:opacity-50"
          >
            <Loader2 v-if="isSubmitting" class="mr-2 h-4 w-4 animate-spin" />
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ROLE_NAME } from '@/common/constants/default.const'
import type { TUser } from '@/common/types'
import api from '@/lib/axios'
import { Loader2, X } from 'lucide-vue-next'
import { reactive, ref } from 'vue'
import { toast } from 'vue3-toastify'
const props = defineProps<{
  show: boolean
  user: TUser
}>()

const emit = defineEmits<{
  (e: 'close'): void
  (e: 'user-updated'): void
}>()

const form = reactive({
  name: props.user.name,
  email: props.user.email,
  phone_number: props.user.phone_number,
  role_id: props.user.role_id,
})

const errors = reactive({
  name: '',
  email: '',
  phone_number: '',
  role_id: '',
})

const isSubmitting = ref(false)

const handleSubmit = async () => {
  Object.keys(errors).forEach((key) => {
    errors[key as keyof typeof errors] = ''
  })

  if (!form.name) errors.name = 'Name is required.'
  if (!form.email || !/\S+@\S+\.\S+/.test(form.email)) errors.email = 'A valid email is required.'
  if (!form.phone_number || form.phone_number.length < 10)
    errors.phone_number = 'Phone number must be at least 10 characters.'
  if (!form.role_id) errors.role_id = 'Role is required.'

  if (Object.values(errors).some((error) => error !== '')) return

  isSubmitting.value = true

  try {
    await api.put(`v1/admin/users/${props.user.id}`, form)
    emit('user-updated')
    emit('close')
    toast.success('User updated successfully')
  } catch (error) {
    console.error(error)
  } finally {
    isSubmitting.value = false
  }
}
</script> -->
