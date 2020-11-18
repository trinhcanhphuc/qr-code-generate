<template>
  <v-footer
    absolute
    flat
    elevation="8"
  >
    <v-col
      class="text-center"
      cols="12"
    >
      {{ new Date().getFullYear() }} — <strong>QR Code Generator</strong>
    </v-col>
  </v-footer>
</template>

<script>
export default {
  name: "Footer",
}
</script>
