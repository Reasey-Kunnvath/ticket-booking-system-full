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
          <p class="text-2xl font-bold">${{ dashboardData?.meta?.total_revenue }}</p>
          <p class="text-xs text-emerald-500">+20.1% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Total Users</h3>
          <Users class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.total_users }}</p>
          <p class="text-xs text-emerald-500">+180.1% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Sales</h3>
          <CreditCard class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.sales_count }}</p>
          <p class="text-xs text-emerald-500">+19% from last month</p>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-muted-foreground">Support Message</h3>
          <Activity class="h-4 w-4 text-muted-foreground" />
        </div>
        <div class="mt-2">
          <p class="text-2xl font-bold">+{{ dashboardData?.meta?.total_support_msg }}</p>
          <p class="text-xs text-emerald-500">+201 since last hour</p>
        </div>
      </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-3">
      <div class="col-span-2 rounded-lg border bg-card p-6 shadow-sm">
        <h3 class="text-lg font-semibold">Overview</h3>
        <div class="mt-4 h-[300px] w-full">
          <!-- Chart placeholder -->
          <div class="flex h-full w-full items-end justify-between gap-2">
            <div
              v-for="(month, index) in months"
              :key="month"
              class="group relative flex w-full flex-col items-center"
            >
              <div
                class="absolute -top-6 hidden rounded bg-black px-2 py-1 text-xs text-white group-hover:block"
              >
                {{ chartValues[index] }}
              </div>
              <div
                class="w-full bg-primary/90"
                :style="{ height: `${(chartValues[index] / 6000) * 100}%` }"
              ></div>
              <span class="mt-2 text-xs text-muted-foreground">{{ month }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="rounded-lg border bg-card p-6 shadow-sm">
        <h3 class="text-lg font-semibold">Recent Sales</h3>
        <p class="text-sm text-muted-foreground">You made 265 sales this month.</p>

        <div class="mt-4 space-y-6">
          <div
            v-for="(sale, index) in recentSales"
            :key="index"
            class="flex items-center justify-between"
          >
            <div class="flex items-center gap-3">
              <div class="flex h-9 w-9 items-center justify-center rounded-full bg-muted">
                {{ sale.initials }}
              </div>
              <div>
                <p class="text-sm font-medium">{{ sale.name }}</p>
                <p class="text-xs text-muted-foreground">{{ sale.email }}</p>
              </div>
            </div>
            <p class="text-sm font-medium">{{ sale.amount }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Activity, CreditCard, DollarSign, Users } from 'lucide-vue-next'
import useAuth from '@/stores/user.context'
import { fetchDashboard } from '@/services/transactionService'

const dashboardData = ref(null)

const { user } = useAuth()

const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
const chartValues = [4500, 3200, 5600, 2400, 3800, 3000, 4800, 4200, 3600, 4800, 3800, 4200]

const loadData = async () => {
  try {
    const response = await fetchDashboard()
    dashboardData.value = response
    console.log(dashboardData)
  } catch (err) {
    console.error(err)
  }
}

onMounted(loadData)

const recentSales = [
  {
    name: 'Olivia Martin',
    email: 'olivia.martin@email.com',
    amount: '+$1,999.00',
    initials: 'OM',
  },
  {
    name: 'Jackson Lee',
    email: 'jackson.lee@email.com',
    amount: '+$39.00',
    initials: 'JL',
  },
  {
    name: 'Isabella Nguyen',
    email: 'isabella.nguyen@email.com',
    amount: '+$299.00',
    initials: 'IN',
  },
  {
    name: 'William Kim',
    email: 'will@email.com',
    amount: '+$99.00',
    initials: 'WK',
  },
  {
    name: 'Sofia Davis',
    email: 'sofia.davis@email.com',
    amount: '+$39.00',
    initials: 'SD',
  },
]
</script>
