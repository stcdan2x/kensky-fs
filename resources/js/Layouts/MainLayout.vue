<template lang="">
  <div>Test Layout</div>

  <h3 v-if="message" :key="xKey">
    <br />
    {{ message }}
    test
  </h3>

  <slot />
</template>

<script setup>
import { computed, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const message = computed(() => usePage().props.flash.success);
const xKey = ref(0);
setInterval(() => {
 
  xKey.value += 1;
}, 300);
</script>

<style lang=""></style>
