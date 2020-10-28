<template>
  <div class="mx-12 mt-10">
    <h1 class="text-center">How Do QR Code Work?</h1>
    <v-card
      v-for="(u, i) in uses"
      :key="i">
      <b>{{ u.name }}</b>
    </v-card>
  </div>
</template>

<script>
export default {
  name: 'HowDoQRCodeWork',
  props: {},
  data() {
    return {
      uses: [
        {
          'image': '',
          'name': 'Make QR Codes for\nBusiness Cards'
        },
        {
          'image': '',
          'name': 'QR Codes on\nLabels & Stickers'
        },
        {
          'image': '',
          'name': 'QR Codes on\nFlyers'
        },
        {
          'image': '',
          'name': 'QR Codes on\nBrochures'
        },
        {
          'image': '',
          'name': 'QR Codes on\nProduct Packaging'
        },
        {
          'image': '',
          'name': 'QR Codes Rescue\nTourism Industry'
        },
        {
          'image': '',
          'name': 'QR Codes for\nGiveaway Contests'
        },
        {
          'image': '',
          'name': 'QR Codes for\nRestaurant Menus'
        }
      ],
    }
  },
};
</script>
