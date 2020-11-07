<template>
  <div class="mt-10">
    <h1 class="text-center">How do QR Code work?</h1>
    <v-flex d-flex>
      <v-layout wrap>
        <v-flex md3 v-for="(u, i) in uses" :key="i">
          <v-card class="card-container m-3">
            <v-img :src="u.image" style="height: 200px"/>
            <div class="m-3" style="height: 70px">
              <h6 class="text-center">{{ u.subtitle }}</h6>
              <h5 class="text-center"><b>{{ u.title }}</b></h5>
            </div>
          </v-card>
        </v-flex>
      </v-layout>
    </v-flex>

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
          'image': '/img/how_to_work/How-to-make-qr-code-for-business-card.jpg',
          'title': 'Business Cards',
          'subtitle': 'Make QR Codes for'
        },
        {
          'image': '/img/how_to_work/using-qr-code-on-labels-and-stickers-768x513.jpg',
          'title': 'Labels & Stickers',
          'subtitle': 'QR Codes on'
        },
        {
          'image': '/img/how_to_work/QR-Codes-on-Flyers.jpg',
          'title': 'Flyers',
          'subtitle': 'QR Codes on'
        },
        {
          'image': '/img/how_to_work/qr-codes-on-brochures-768x554.jpg',
          'title': 'Brochures',
          'subtitle': 'QR Codes on'
        },
        {
          'image': '/img/how_to_work/qr-codes-on-product-packaging.jpg',
          'title': 'Product Packaging',
          'subtitle': 'QR Codes on'
        },
        {
          'image': '/img/how_to_work/How-A-QR-Code-Generator-Helps-save-Tourism-Industry-768x512.jpg',
          'title': 'Tourism Industry',
          'subtitle': 'QR Codes Rescue'
        },
        {
          'image': '/img/how_to_work/Make-a-QR-Code-for-Giveaway-Coffee-768x512.jpg',
          'title': 'Giveaway Contests',
          'subtitle': 'QR Codes for'
        },
        {
          'image': '/img/how_to_work/Make-a-QR-Code-for-Restaurant-Menu-Ordering.jpg',
          'title': 'Restaurant Menus',
          'subtitle': 'QR Codes for'
        }
      ],
    }
  }
}
</script>
