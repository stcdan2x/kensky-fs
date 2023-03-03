<template>
  <Link href="/listing/create">Listings Create link</Link>
  <br />
  <br />
  <br />
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="route('listing.show', { listing: listing.id })">
      {{ listing.id }}
      <ListingAddress :listing-data="listing" />
    </Link>
    ---
    <Link :href="route('listing.edit', { listing: listing.id })"> EDIT </Link>
    ---
    <Link
      :href="route('listing.destroy', { listing: listing.id })"
      method="DELETE"
      as="button"
    >
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
