<template>
  <div>
    <Box>
      <div class="m-28 mb-4">You must verify your e-mail to continue.</div>
      <div class="m-28 my-4">
        We sent you an e-mail containing a link, please click the link provided
        there to verify.
      </div>
      <div class="m-28 mt-14 mb-4">
        Did not receive a link? Click the button below to re-send the verification link to your registered e-mail address:
      </div>

      <Box class="m-28 mt-5 text-center">
        <Link
          :href="route('verification.send')"
          method="post"
          as="button"
          class="text-indigo-600 dark:text-indigo-300"
        >
          Resend verification code
        </Link>
      </Box>
    </Box>
  </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import { Link } from '@inertiajs/vue3';
</script>
