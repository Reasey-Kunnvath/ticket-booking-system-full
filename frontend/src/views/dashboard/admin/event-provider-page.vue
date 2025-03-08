<template>
  <div>
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold">Tasks</h1>
        <p class="text-sm text-muted-foreground">Here's a list of your tasks for this month!</p>
      </div>
      <div class="flex items-center gap-2">
        <button
          class="flex items-center gap-1 rounded-md border px-4 py-2 text-sm font-medium hover:bg-accent"
        >
          <Download class="h-4 w-4" />
          Import
        </button>
        <button
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
          type="text"
          placeholder="Filter tasks..."
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

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b text-left text-sm font-medium text-muted-foreground">
              <th class="w-[40px] px-4 py-3">
                <input type="checkbox" class="h-4 w-4 rounded border-gray-300" />
              </th>
              <th class="px-4 py-3">Task</th>
              <th class="px-4 py-3">Title</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Priority</th>
              <th class="w-[40px] px-4 py-3"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="task in tasks" :key="task.id" class="border-b">
              <td class="px-4 py-3">
                <input type="checkbox" class="h-4 w-4 rounded border-gray-300" />
              </td>
              <td class="px-4 py-3 text-sm font-medium">{{ task.id }}</td>
              <td class="max-w-[400px] truncate px-4 py-3">
                <div class="flex items-center gap-2">
                  <span class="rounded bg-muted px-1.5 py-0.5 text-xs font-medium">{{
                    task.type
                  }}</span>
                  <span class="text-sm">{{ task.title }}</span>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-2">
                  <div
                    :class="[
                      'h-2 w-2 rounded-full',
                      task.status === 'In Progress'
                        ? 'bg-blue-500'
                        : task.status === 'Backlog'
                          ? 'bg-yellow-500'
                          : task.status === 'Todo'
                            ? 'bg-gray-500'
                            : task.status === 'Done'
                              ? 'bg-green-500'
                              : task.status === 'Canceled'
                                ? 'bg-red-500'
                                : '',
                    ]"
                  ></div>
                  <span class="text-sm">{{ task.status }}</span>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-1">
                  <ArrowUp v-if="task.priority === 'High'" class="h-4 w-4 text-red-500" />
                  <ArrowRight v-if="task.priority === 'Medium'" class="h-4 w-4 text-yellow-500" />
                  <ArrowDown v-if="task.priority === 'Low'" class="h-4 w-4 text-blue-500" />
                  <span class="text-sm">{{ task.priority }}</span>
                </div>
              </td>
              <td class="px-4 py-3">
                <button class="rounded-md p-1 hover:bg-accent">
                  <MoreHorizontal class="h-4 w-4" />
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex items-center justify-between border-t px-4 py-3">
        <p class="text-sm text-muted-foreground">0 of 100 row(s) selected.</p>
        <div class="flex items-center gap-2">
          <span class="text-sm">Rows per page:</span>
          <select class="h-8 rounded-md border bg-transparent px-2 text-sm">
            <option>10</option>
            <option>20</option>
            <option>50</option>
            <option>100</option>
          </select>
          <div class="flex items-center gap-1">
            <span class="text-sm">Page 1 of 10</span>
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
  </div>
</template>

<script setup lang="ts">
import {
  ArrowDown,
  ArrowRight,
  ArrowUp,
  ArrowUpDown,
  ChevronLeft,
  ChevronRight,
  ChevronsLeft,
  ChevronsRight,
  Clock,
  Download,
  MoreHorizontal,
  Plus,
  SlidersHorizontal,
} from 'lucide-vue-next'

const tasks = [
  {
    id: 'TASK-8782',
    type: 'Documentation',
    title: "You can't compress the program without quantifying the open-source SAS pixel!",
    status: 'In Progress',
    priority: 'Medium',
  },
  {
    id: 'TASK-7878',
    type: 'Documentation',
    title: 'Try to calculate the EXE feed, maybe it will index the multi-byte pixel!',
    status: 'Backlog',
    priority: 'Medium',
  },
  {
    id: 'TASK-7839',
    type: 'Bug',
    title: 'We need to bypass the neural TCP card!',
    status: 'Todo',
    priority: 'High',
  },
  {
    id: 'TASK-5562',
    type: 'Feature',
    title: 'The SAS interface is down, bypass the open-source pixel so we can back up the API!',
    status: 'Backlog',
    priority: 'Medium',
  },
  {
    id: 'TASK-8686',
    type: 'Feature',
    title: "I'll parse the wireless SSL protocol, that should driver the API panel!",
    status: 'Canceled',
    priority: 'Medium',
  },
  {
    id: 'TASK-1280',
    type: 'Bug',
    title: 'Use the digital TLS panel, then you can transmit the haptic system!',
    status: 'Done',
    priority: 'High',
  },
  {
    id: 'TASK-7262',
    type: 'Feature',
    title:
      'The UTF8 application is down, parse the neural bandwidth so we can back up the PNG firewall!',
    status: 'Done',
    priority: 'High',
  },
  {
    id: 'TASK-1138',
    type: 'Feature',
    title: "Generating the driver won't do anything, we need to quantify the 1080p JSON pixel!",
    status: 'In Progress',
    priority: 'Medium',
  },
  {
    id: 'TASK-7184',
    type: 'Feature',
    title: 'We need to program the back-end THX pixel!',
    status: 'Todo',
    priority: 'Low',
  },
  {
    id: 'TASK-5160',
    type: 'Documentation',
    title: "Calculating the bus won't do anything, we need to navigate the back-end SQL protocol!",
    status: 'In Progress',
    priority: 'High',
  },
]
</script>
