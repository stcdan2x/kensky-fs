<template>
  <Box>
    <template #header>
      Offer ID:{{ offer.id }}
      <span
        v-if="offer.accepted_at"
        class="dark:bg-green-900 dark:text-green-200 bg-green-200 text-green-900 p-1 rounded-md uppercase ml-1"
      >accepted</span>
      <span
        v-if="offer.rejected_at"
        class="dark:bg-red-900 dark:text-red-200 bg-red-200 text-red-900 p-1 rounded-md uppercase ml-1"
      >rejected</span>
    </template>

    <section class="flex items-center justify-between">
      <div>
        <Price :price="offer.amount" class="text-xl" />

        <div class="text-gray-500">
          Difference <Price :price="difference" />
        </div>

        <div class="text-gray-500 text-sm">Offered by {{ offer.bidder.name }}</div>

        <div class="text-gray-500 text-sm">Offered on {{ madeOn }}</div>
      </div>
      <div>
        <Link
          v-if="!isSold"
          :href="route('realtor.offer.accept', { offer: offer.id })"
          class="btn-outline text-xs font-medium"
          as="button"
          method="put"
        >
          Accept
        </Link>
      </div>
    </section>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue';
import Box from '@/Components/UI/Box.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
  offer: Object,
  listingPrice: Number,
  isSold: Boolean,
});

const difference = computed(() => props.offer.amount - props.listingPrice);

const madeOn = computed(() => new Date(props.offer.created_at).toDateString());

</script>
