<template>
  <div>
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold">Roles Management</h1>
        <p class="text-sm text-muted-foreground">Here's a list of your roles!</p>
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
              <th class="px-4 py-3">Role Name</th>
              <th class="px-4 py-3">Created At</th>
              <th class="w-[80px] px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Check if the data array is empty -->
            <tr v-if="!rolesList?.length">
              <td colspan="6" class="text-center py-3">No roles found</td>
            </tr>

            <tr v-for="(role, index) in rolesList" :key="role.id" class="border-b">
              <td class="px-4 py-3 text-sm font-medium">{{ index + 1 }}</td>
              <!-- Handle missing role data -->
              <td class="px-4 py-3">
                <Badge :class="role.id ? RoleBadgeColor[role.id] : 'bg-gray-200'" class="px-3 py-1">
                  {{ role.role_name ?? 'Unknown Role' }}
                </Badge>
              </td>
              <td class="px-4 py-3 text-sm font-medium">{{ role.created_at ?? 'N/A' }}</td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-1">
                  <button @click="openEditModal(role)" class="rounded-md p-1 hover:bg-accent">
                    <Pencil class="h-4 w-4" />
                  </button>
                  <button @click="openDeleteModal(role)" class="rounded-md p-1 hover:bg-accent">
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

    <CreateUserModal
      v-if="showCreateModal"
      :show="showCreateModal"
      @close="closeCreateModal"
      @user-created="handleUserCreated"
    />

    <EditUserModal
      v-if="showEditModal && selectedRole"
      :show="showEditModal"
      :user="selectedRole"
      @close="closeEditModal"
      @user-updated="handleUserUpdated"
    />

    <DeleteUserModal
      v-if="showDeleteModal"
      :show="showDeleteModal"
      :user="selectedRole"
      @close="closeDeleteModal"
      @user-deleted="handleUserDeleted"
    />
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
import CreateUserModal from './create-role-modal.vue'
import DeleteUserModal from './delete-role-modal.vue'
import EditUserModal from './update-role-modal.vue'

const rolesList = ref<TUserList[]>([])
const filterText = ref('')
const rowsPerPage = ref(10)
const currentPage = ref(1)
const totalPages = ref(1)

const showCreateModal = ref(false)
const showEditModal = ref(false)
const showDeleteModal = ref(false)
const selectedRole = ref<TUser | null>(null)

onMounted(async () => {
  await fetchRoles()
})

const fetchRoles = async () => {
  try {
    const res = await api.get<TBaseApiResponse<TUserList>>('v1/admin/roles')
    rolesList.value = res.data.data
    console.log(rolesList.value)
  } catch (error) {
    console.error('Error fetching users:', error)
  }
}

// Modal handlers
const openCreateModal = () => {
  showCreateModal.value = true
}

const closeCreateModal = () => {
  showCreateModal.value = false
}

const openEditModal = (user: TUser) => {
  selectedRole.value = user
  showEditModal.value = true
}

const closeEditModal = () => {
  selectedRole.value = null
  showEditModal.value = false
}

const openDeleteModal = (user: TUser) => {
  selectedRole.value = user
  showDeleteModal.value = true
}

const closeDeleteModal = () => {
  selectedRole.value = null
  showDeleteModal.value = false
}

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
