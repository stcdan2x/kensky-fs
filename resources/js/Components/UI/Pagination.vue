<template>
  <div class="flex gap-1">
    <Link
      v-for="(link, index) in links"
      :key="index"
      class="py-2 px-4 rounded-md"
      :href="link?.url"
      :class="{
        'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active,
        'opacity-30':
          (index === 0 && links[1]?.active) ||
          (index === links?.length - 1 && links[links?.length - 2]?.active),
      }"
      v-html="link.label"
    />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ links: Array });
</script>
