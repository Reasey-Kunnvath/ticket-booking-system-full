<template>
  <div>
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold">Order Page</h1>
        <p class="text-sm text-muted-foreground">Here's a list of your users!</p>
      </div>
      <div class="flex items-center gap-2">
        <button
          class="flex items-center gap-1 rounded-md border px-4 py-2 text-sm font-medium hover:bg-accent"
        >
          <Download class="h-4 w-4" />
          Import
        </button>
        <button
          @click="openCreateModal"
          class="flex items-center gap-1 rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90"
        >
          <Plus class="h-4 w-4" />
          Create
        </button>
      </div>
    </div>

    <div class="mt-6 rounded-lg border bg-card shadow-sm">
      <div class="flex items-center border-b px-4 py-2">
        <input
          v-model="filterText"
          type="text"
          placeholder="Filter ..."
          class="h-9 w-full bg-transparent text-sm placeholder:text-muted-foreground focus:outline-none"
        />
        <div class="flex items-center gap-2">
          <button class="flex items-center gap-1 rounded-md border px-3 py-1 text-sm">
            <Clock class="h-4 w-4" />
            Status
          </button>
          <button class="flex items-center gap-1 rounded-md border px-3 py-1 text-sm">
            <ArrowUpDown class="h-4 w-4" />
            Priority
          </button>
          <button class="flex items-center gap-1 rounded-md border px-3 py-1 text-sm">
            <SlidersHorizontal class="h-4 w-4" />
            View
          </button>
        </div>
      </div>

      <!-- User Table -->
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead>
            <tr class="border-b text-left text-sm font-medium text-muted-foreground">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">User</th>
              <th class="px-4 py-3">Ticket</th>
              <th class="px-4 py-3">QTY</th>
              <th class="px-4 py-3">Total Amount</th>
              <th class="px-4 py-3">Coupon</th>
              <th class="px-4 py-3">Created At</th>
              <th class="w-[80px] px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- Check if the data array is empty -->
            <tr v-if="!usersList?.data?.length">
              <td colspan="6" class="text-center py-3">No users found</td>
            </tr>

            <tr v-for="(user, index) in usersList.data" :key="user.id" class="border-b">
              <td class="px-4 py-3 text-sm font-medium">{{ index + 1 }}</td>
              <td class="px-4 py-3">{{ user.name }}</td>
              <td class="px-4 py-3 max-w-[200px]">{{ user.email }}</td>
              <!-- Handle missing phone_number -->
              <td class="px-4 py-3 max-w-[200px]">{{ user.phone_number ?? 'N/A' }}</td>
              <!-- Handle missing role data -->
              <td class="px-4 py-3">
                <Badge
                  :class="user.role_id ? RoleBadgeColor[user.role_id] : 'bg-gray-200'"
                  class="px-3 py-1"
                >
                  {{ user.role?.role_name ?? 'Unknown Role' }}
                </Badge>
              </td>
              <!-- Handle missing created_at -->
              <td class="px-4 py-3 min-w-[200px]">
                {{ formatDate(user.created_at) ?? 'N/A' }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-1">
                  <button @click="openEditModal(user)" class="rounded-md p-1 hover:bg-accent">
                    <Pencil class="h-4 w-4" />
                  </button>
                  <button @click="openDeleteModal(user)" class="rounded-md p-1 hover:bg-accent">
                    <Trash class="h-4 w-4" />
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination Section -->
      <div class="flex items-center justify-between border-t px-4 py-3">
        <p class="text-sm text-muted-foreground">0 of 100 row(s) selected.</p>
        <div class="flex items-center gap-2">
          <span class="text-sm">Rows per page:</span>
          <select v-model="rowsPerPage" class="h-8 rounded-md border bg-transparent px-2 text-sm">
            <option>10</option>
            <option>20</option>
            <option>50</option>
            <option>100</option>
          </select>
          <div class="flex items-center gap-1">
            <span class="text-sm">Page {{ currentPage }} of {{ totalPages }}</span>
            <div class="flex items-center">
              <button class="rounded-md p-1 hover:bg-accent">
                <ChevronsLeft class="h-4 w-4" />
              </button>
              <button class="rounded-md p-1 hover:bg-accent">
                <ChevronLeft class="h-4 w-4" />
              </button>
              <button class="rounded-md p-1 hover:bg-accent">
                <ChevronRight class="h-4 w-4" />
              </button>
              <button class="rounded-md p-1 hover:bg-accent">
                <ChevronsRight class="h-4 w-4" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <CreateUserModal
      v-if="showCreateModal"
      :show="showCreateModal"
      @close="closeCreateModal"
      @user-created="handleUserCreated"
    />

    <EditUserModal
      v-if="showEditModal && selectedUser"
      :show="showEditModal"
      :user="selectedUser"
      @close="closeEditModal"
      @user-updated="handleUserUpdated"
    />

    <DeleteUserModal
      v-if="showDeleteModal"
      :show="showDeleteModal"
      :user="selectedUser"
      @close="closeDeleteModal"
      @user-deleted="handleUserDeleted"
    /> -->
  </div>

</template>

<script setup lang="ts">
import { RoleBadgeColor } from '@/common/constants/color.const'
import { formatDate } from '@/common/helper/date.helper'
import type { TBaseApiResponse, TUser, TUserList } from '@/common/types'
import { Badge } from '@/components/ui/badge'
import api from '@/lib/axios'
import {
  ArrowUpDown,
  ChevronLeft,
  ChevronRight,
  ChevronsLeft,
  ChevronsRight,
  Clock,
  Download,
  Pencil,
  Plus,
  SlidersHorizontal,
  Trash,
} from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
// import CreateUserModal from './create-user-modal.vue'
// import DeleteUserModal from './delete-user-modal.vue'
// import EditUserModal from './update-user-modal.vue'

const usersList = ref<TUserList[]>([])
const filterText = ref('')
const rowsPerPage = ref(10)
const currentPage = ref(1)
const totalPages = ref(1)

const showCreateModal = ref(false)
const showEditModal = ref(false)
const showDeleteModal = ref(false)
const selectedUser = ref<TUser | null>(null)

onMounted(async () => {
  await fetchUsers()
})

const fetchUsers = async () => {
  try {
    const res = await api.get<TBaseApiResponse<TUserList>>('v1/admin/users')
    usersList.value = res.data.data
    console.log(usersList.value)
  } catch (error) {
    console.error('Error fetching users:', error)
  }
}

// Modal handlers
// const openCreateModal = () => {
//   showCreateModal.value = true
// }

// const closeCreateModal = () => {
//   showCreateModal.value = false
// }

// const openEditModal = (user: TUser) => {
//   selectedUser.value = user
//   showEditModal.value = true
// }

// const closeEditModal = () => {
//   selectedUser.value = null
//   showEditModal.value = false
// }

// const openDeleteModal = (user: TUser) => {
//   selectedUser.value = user
//   showDeleteModal.value = true
// }

// const closeDeleteModal = () => {
//   selectedUser.value = null
//   showDeleteModal.value = false
// }

const handleUserCreated = async () => {
  await fetchUsers()
  closeCreateModal()
}

const handleUserUpdated = async () => {
  await fetchUsers()
  closeEditModal()
}

const handleUserDeleted = async () => {
  await fetchUsers()
  closeDeleteModal()
}
</script>
  <style>
  .bg-gradients-success {
    background-image: linear-gradient(310deg, #22c55e 0%, #98ec2d 100%);
    color: #ffffff;
  }
  .bg-gradients-danger {
    background-image: linear-gradient(310deg, #c52222 0%, #da7575 100%);
    color: #ffffff;
  }
  .bg-gradients-warning {
    background-image: linear-gradient(310deg, #ff9a02 0%, #ffb74c 100%);
    color: #ffffff;
  }
</style>
