<!-- <template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="w-full max-w-md rounded-lg bg-background p-6 shadow-lg" @click.stop>
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold">Delete User</h2>
        <button @click="$emit('close')" class="rounded-full p-1 hover:bg-muted">
          <X class="h-5 w-5" />
        </button>
      </div>

      <div class="mt-4 space-y-4">
        <div class="rounded-md bg-destructive/10 p-4 text-destructive">
          <div class="flex items-start">
            <AlertTriangle class="mr-2 h-5 w-5" />
            <div>
              <h3 class="font-medium">Warning</h3>
              <p class="text-sm">
                Are you sure you want to delete this user? This action cannot be undone.
              </p>
            </div>
          </div>
        </div>

        <div class="rounded-md border p-4">
          <div class="grid gap-1">
            <p class="text-sm font-medium">User Details</p>
            <p class="text-sm"><span class="font-medium">Name:</span> {{ user?.name }}</p>
            <p class="text-sm"><span class="font-medium">Email:</span> {{ user?.email }}</p>
            <p class="text-sm">
              <span class="font-medium">Role:</span> {{ user ? ROLE_NAME[user.role_id] : '' }}
            </p>
          </div>
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
            type="button"
            @click="handleDelete"
            :disabled="isDeleting"
            class="rounded-md bg-destructive px-4 py-2 text-sm font-medium text-destructive-foreground hover:bg-destructive/90 disabled:opacity-50"
          >
            <Loader2 v-if="isDeleting" class="mr-2 h-4 w-4 animate-spin" />
            Delete User
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { X, AlertTriangle, Loader2 } from 'lucide-vue-next'
import { ROLE_NAME } from '@/common/constants/default.const'
import api from '@/lib/axios'
import type { TUser } from '@/common/types'
import { toast } from 'vue3-toastify'

const props = defineProps<{
  show: boolean
  user: TUser | null
}>()

const emit = defineEmits<{
  (e: 'close'): void
  (e: 'user-deleted'): void
}>()

const isDeleting = ref(false)

const handleDelete = async () => {
  if (!props.user) return

  isDeleting.value = true

  try {
    await api.delete(`v1/admin/users/${props.user.id}`)
    emit('user-deleted')
    toast.success('User deleted successfully')
  } catch (error) {
    console.error('Error deleting user:', error)
  } finally {
    isDeleting.value = false
  }
}
</script> -->
