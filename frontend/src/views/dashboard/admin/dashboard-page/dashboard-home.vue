<template>
  <div>
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-bold">Welcome back, {{ user?.name }}</h1>
      <button
        class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90"
      >
        Download
      </button>
    </div>

    <div class="mt-4 flex space-x-2 border-b">
      <button class="border-b-2 border-primary px-4 py-2 text-sm font-medium">Overview</button>
      <button class="px-4 py-2 text-sm font-medium text-muted-foreground">Analytics</button>
      <button class="px-4 py-2 text-sm font-medium text-muted-foreground">Reports</button>
      <button class="px-4 py-2 text-sm font-medium text-muted-foreground">Notifications</button>
    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Total Revenue</h3>
          <DollarSign class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">${{ dashboardData?.meta?.totalRevenue }}</p>
          <p class="text-xs text-emerald-500">+20.1% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Total Users</h3>
          <Users class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.totalUserCount }}</p>
          <p class="text-xs text-emerald-500">+180.1% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Sales</h3>
          <CreditCard class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.salesCount }}</p>
          <p class="text-xs text-emerald-500">+19% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Support Message</h3>
          <Activity class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.totalSupportMessageCount }}</p>
          <p class="text-xs text-emerald-500">+201 since last hour</p>
        </div>
      </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-3">
      <div class="col-span-2 rounded-lg border bg-card p-5 shadow-sm">
        <h3 class="text-lg font-semibold">Overview</h3>
        <div class="mt-4 h-[300px] w-full flex">
          <!-- Y-axis (Vertical Measurements) -->
          <div
            class="w-16 flex flex-col justify-between items-end pr-8 text-xs text-muted-foreground"
          >
            <span v-for="label in yAxisLabels" :key="label">{{ label }}</span>
          </div>
          <!-- Chart container -->
          <div class="flex-1 h-full relative">
            <!-- Grid lines -->
            <div
              v-for="(label, index) in yAxisLabels"
              :key="label"
              class="absolute w-full border-t border-gray-200"
              :style="{ top: `${(index / (yAxisLabels.length - 1)) * 100 - 20}%` }"
            ></div>
            <!-- Bars -->
            <div class="flex-1 h-full flex items-end justify-between gap-2">
              <div
                v-for="(month, index) in dashboardData?.meta?.chartComponents?.months"
                :key="month"
                class="group relative flex w-full flex-col items-center"
              >
                <!-- Tooltip -->
                <div
                  class="absolute -top-6 hidden rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
                >
                  {{ dashboardData?.meta?.chartComponents?.chartValues[index] }}
                </div>
                <!-- Bar -->
                <div
                  class="w-full bg-primary/90 transition-all"
                  :style="{
                    height: `${(dashboardData?.meta?.chartComponents?.chartValues[index] / maxValue) * 300 - 40}px`,
                  }"
                ></div>
                <!-- Month label -->
                <span class="mt-2 text-xs text-muted-foreground">{{ month }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <h3 class="text-lg font-semibold">Recent Sales</h3>
        <p class="text-sm text-muted-foreground">
          You made {{ dashboardData?.meta?.salesCount }} sales this month.
        </p>

        <div class="mt-4 space-y-6">
          <div
            v-for="(sale, index) in dashboardData?.meta?.userOrder"
            :key="index"
            class="flex items-center justify-between"
          >
            <div class="flex items-center gap-3">
              <div class="flex h-9 w-9 items-center justify-center rounded-full bg-muted">
                {{ sale.initials }}
              </div>
              <div>
                <p class="text-sm font-medium">{{ sale.user?.name }}</p>
                <p class="text-xs text-muted-foreground">{{ sale.user?.email }}</p>
              </div>
            </div>
            <p class="text-sm font-medium">{{ sale.total_amount }}$</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { Activity, CreditCard, DollarSign, Users } from 'lucide-vue-next'
import useAuth from '@/stores/user.context'
import { fetchDashboard } from '@/services/transactionService'

const dashboardData = ref(null)

const { user } = useAuth()
// Use chartValues directly from chartComponents
const chartValues = computed(() => {
  return dashboardData.value?.meta?.chartComponents?.chartValues || Array(12).fill(0)
})

// Computed property for max value
const maxValue = computed(() => {
  const max = Math.max(...chartValues.value)
  return max > 0 ? max : 1 // Prevent division by zero
})
// Y-axis labels (0 at bottom, max at top)
const yAxisLabels = computed(() => {
  const max = maxValue.value
  const steps = 5 // Number of labels
  const stepValue = max / (steps - 1)
  return Array.from({ length: steps }, (_, i) => Math.round((steps - 1 - i) * stepValue))
})

const loadData = async () => {
  try {
    const response = await fetchDashboard()
    dashboardData.value = response
  } catch (err) {
    console.error(err)
  }
}

onMounted(loadData)
</script>

<style scoped>
.mt-4 {
  position: relative;
}

.bg-primary\/90 {
  background-color: #8a00c5;
}
</style>
