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
        <h3 class="text-lg font-semibold">Revenue by month</h3>
        <BarChart
          index="name"
          :data="dashboardData?.meta?.chartComponents?.data"
          :categories="['total', 'predicted']"
          :y-formatter="
            (tick, i) => {
              return typeof tick === 'number'
                ? `$ ${new Intl.NumberFormat('us').format(tick).toString()}`
                : ''
            }
          "
          :type="'grouped'"
          :colors="['#42b883', '#f4e6fa']"
          :rounded-corners="4"
          :show-legend="true"
        />
      </div>

      <!-- recent sales -->
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
import { BarChart } from '@/components/ui/chart-bar'
import useAuth from '@/stores/user.context'
import { fetchDashboard } from '@/services/transactionService'

const dashboardData = ref<any>(null)

const { user } = useAuth()

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
