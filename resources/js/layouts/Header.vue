<template>
  <v-app-bar
    color="white"
    elevation="8"
    fixed
    flat
  >
    <v-container class="py-0 px-2 fill-height">
      <v-avatar
        size="40"
        tile
      >
        <v-img
          src="/img/brand/qr-logo.png"
          alt="QR Generator Logo"
        ></v-img>
      </v-avatar>
      <v-spacer></v-spacer>
      <v-btn
        v-for="(page, idx) in pages"
        :key="idx"
        text
      >
        <router-link
          :to=page.url
        >
        {{ page.title }}
        </router-link>
      </v-btn>
      <v-btn>
        <router-link
          to='/login'
        >
          <v-icon>
            fas fa-user
          </v-icon>
        </router-link>
      </v-btn>
    </v-container>
  </v-app-bar>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
    btn_share_property: {
      direction: 'top',
      fab: false,
      fling: false,
      hover: false,
      tabs: null,
      transition: 'slide-y-reverse-transition',
    },
      fab: false,
      pages: [
        {
          'title': 'QR Generator',
          'url': '/'
        },
        {
          'title': 'QR Scanner',
          'url': '/qr-scanner'
        },
        {
          'title': 'About',
          'url': '/about'
        }
      ],
      is_qr_full_screen: false,
      valid: true,
      panel: [0],
      selectedQrType: 'url',
      qrImageSrc: 'img/brand/qr-logo.png',
      card_form_data: {
        pre_gender: 'Mr',
        first_name: '',
        last_name: '',
        email: '',
        work_phone: '',
        private_phone: '',
        cell_phone: '',
        address_label: '',
        address_street: '',
        address_city: '',
        address_province: '',
        address_postcode: '',
        address_country: ''
      },
      url_form_data: {
        url: ''
      },
      text_form_data: {
        text: ''
      },
      phone_form_data: {
        phone: ''
      },
      sms_form_data: {
        phone: '',
        message: ''
      },
      email_form_data: {
        email: '',
        subject: '',
        cc: '',
        bcc: '',
        body: ''
      },
      background_color: '#FFFFFF',
      foreground_color: '#000000',
      default_background_color: '#FFFFFF',
      default_foreground_color: '#000000',
      logo_form_data: {
        logo_src: ''
      },
      qr_types: ['url', 'text', 'phone', 'sms', 'email', 'business_card']
    };
  },
  methods: {
    onScroll(e) {
      if (typeof window === 'undefined') return
      const top = window.pageYOffset || e.target.scrollTop || 0
      this.fab = top > 20
    },
    toTop() {
      this.$vuetify.goTo(0)
    },
    validate() {
      this.$refs.form.validate()
    },
    changeQrType(qr_type) {
      this.selectedQrType = qr_type;
    },
    downloadQr() {
      let qr_tag = document.createElement('a');
      qr_tag.href = this.qrImageSrc;
      qr_tag.download = 'qr_code.png';
      qr_tag.click();
    },
    updateTextFormData(formData) {
      this.text_form_data = formData;
    },
    updateUrlFormData(formData) {
      this.url_form_data = formData;
    },
    updatePhoneFormData(formData) {
      this.phone_form_data = formData;
    },
    updateSmsFormData(formData) {
      this.sms_form_data = formData;
    },
    updateEmailFormData(formData) {
      this.email_form_data = formData;
    },
    updateCardFormData(formData) {
      this.card_form_data = formData;
    },
    updateForegroundColor(color) {
      this.foreground_color = color;
    },
    updateBackgroundColor(color) {
      this.background_color = color;
    },
    updateLogoFormData(formData) {
      this.logo_form_data = formData;
    },
    createQR() {
      if (!this.validateForm()) return;

      let formData = this.formData();
      let qrData = {
        'type': this.selectedQrType,
        'form_data': formData,
        'fore_color': this.foreground_color.slice(1).convertToRGB(),
        'back_color': this.background_color.slice(1).convertToRGB(),
        'logo': this.logo_form_data.logo_src,
        'format': 'png'
      }
      axios.post('/qrcode/render', qrData)
        .then(res => {
          this.qrImageSrc = res.data + '?' + new Date().getTime();
        }).catch(err => {
        console.log(err);
      });
    },
    validateForm() {
      switch (this.selectedQrType) {
        case 'url':
          return this.$refs.url_form.validate();
        case 'text':
          return this.$refs.text_form.validate();
        case 'phone':
          return this.$refs.phone_form.validate();
        case 'sms':
          return this.$refs.sms_form.validate();
        case 'email':
          return this.$refs.email_form.validate();
        case 'business_card':
          return this.$refs.card_form.validate();
      }
    },
    formData() {
      let formData;
      switch (this.selectedQrType) {
        case 'url':
          formData = this.url_form_data;
          break;
        case 'text':
          formData = this.text_form_data;
          break;
        case 'phone':
          formData = this.phone_form_data;
          break;
        case 'sms':
          formData = this.sms_form_data;
          break;
        case 'email':
          formData = this.email_form_data;
          break;
        case 'business_card':
          formData = this.card_form_data;
          break;
      }
      return formData;
    },
    shareToSocial(socialName) {
      switch (socialName) {
        case 'FB':
          window.open(this.getFbShareLink(), '_blank');
          break;
        case 'TW':
          window.open(this.getTwitterLink(), '_blank');
          break;
      }


    },
    getFbShareLink() {
      return 'http://www.facebook.com/sharer.php?u=' + this.getImageLink();
    },
    getTwitterLink() {
      return 'https://twitter.com/intent/tweet?url=' + this.getImageLink();
    },
    getImageLink() {
      return window.location.origin + '/' + this.qrImageSrc;
    }
  }
}

String.prototype.convertToRGB = function () {
  if (this.length != 6) {
    throw "Only six-digit hex colors are allowed.";
  }

  let aRgbHex = this.match(/.{1,2}/g);
  let aRgb = [
    parseInt(aRgbHex[0], 16),
    parseInt(aRgbHex[1], 16),
    parseInt(aRgbHex[2], 16)
  ];
  return aRgb;
}
</script>
