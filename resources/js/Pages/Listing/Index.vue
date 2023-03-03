<template>
  <Link href="/listing/create">Listings Create link</Link>
  <br />
  <br />
  <br />
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`/listing/${listing.id}`">
      {{ listing.id }}
      <ListingAddress :listing-data="listing" />
    </Link>
    ---
    <Link :href="`/listing/${listing.id}/edit`"> EDIT </Link>
    ---
    <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">
      DELETE
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';

defineProps({
  listings: Array,
});

</script>

<style>
button {
  cursor: pointer;
  background-color: rgb(56, 30, 0);
  color: rgb(255, 200, 200);
}
</style>
