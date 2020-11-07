<template>
  <div class="mt-10">
    <h1 class="text-center">Why use QR Codes?</h1>
    <v-flex d-flex>
      <v-layout wrap>
        <v-flex md4 v-for="(r, i) in reasons" :key="i">
          <v-card class="card-container m-3">
            <v-img :src="r.image" style="height: 200px"/>
            <div class="m-3" style="height: 250px">
              <h4 class="text-center"><b>{{ r.title }}</b></h4>
              <h5 class="mt-5"><pre style="white-space: pre-wrap">{{ r.subtitle }}</pre></h5>
            </div>
          </v-card>
        </v-flex>
      </v-layout>
    </v-flex>

  </div>
</template>

<script>
export default {
  name: 'WhyUseQR',
  props: {},
  data() {
    return {
      reasons: [
        {
          'image': '/img/why_use/QR-Scanning-Is-Rising.jpg',
          'title': 'QR Scanning is Rising',
          'subtitle': `A survey showed that an estimated 11 million households will scan a QR Code in 2020 in USA alone.\n\nYou should be using QR codes to attract more customers – they can be used to digitalize your business.`
        },
        {
          'image': '/img/why_use/Convert-Your-Clients-with-QR-Code.jpg',
          'title': 'Get More Sales',
          'subtitle': 'Send your customers to an online store, get product reviews, offer them coupons, or collect e-mails.\n\nAnything that you need, QR Codes will help you bridge the gap between the physical and digital.'
        },
        {
          'image': '/img/why_use/QR-Code-placement-billboards-business-card.jpg',
          'title': 'Make an Impact',
          'subtitle': 'Once you’ve created your QR Code, you can place it on any surface or medium of your choice. \n\nFrom products and billboards to business cards. Avoid small QR Codes, make sure they are always readable.'
        }
      ],
    }
  }
}
</script>
