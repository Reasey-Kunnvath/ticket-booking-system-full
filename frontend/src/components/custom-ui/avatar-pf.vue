<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
</script>

<template>
  <Avatar size="sm" class="h-8 w-8">
    <AvatarImage src="https://github.com/unovue.png" alt="@unovue" />
    <AvatarFallback>CN</AvatarFallback>
  </Avatar>
</template>
