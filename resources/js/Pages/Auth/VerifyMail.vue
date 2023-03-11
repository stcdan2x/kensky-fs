<template>
  <div>You must verify your e-mail to continue.</div>

  <Link
    :href="route('verification.send')"
    method="post"
    as="button"
    class="text-indigo-600 dark:text-indigo-300"
  >
    Resend verification code
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
