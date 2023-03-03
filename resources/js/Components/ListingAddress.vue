<template>
  <span>
    {{ listingData.street }} {{ listingData.street_nr }}, {{ listingData.city }}
  </span>
</template>

<script setup>
defineProps({
  listingData: Object,
});
</script>
