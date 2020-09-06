<template>
  <div>
    <div class="row">
      <div class="col-md-9">
        <input name="token" type="hidden" value="" />
        <CButtonGroup class="w-100 d-flex" size="lg">
          <CButton :color="selectedQrType == 'url' ? 'info' : 'primary'" v-on:click="selectQrType('url')">
            URL
            <input type="radio" value="url" class="w-0">
          </CButton>
          <CButton :color="selectedQrType == 'text' ? 'info' : 'primary'" v-on:click="selectQrType('text')">
            Text
            <input type="radio" value="text" class="w-0">
          </CButton>
          <CButton :color="selectedQrType == 'phone' ? 'info' : 'primary'" v-on:click="selectQrType('phone')">
            Phone
            <input type="radio" value="phone" class="w-0">
          </CButton>
          <CButton :color="selectedQrType == 'sms' ? 'info' : 'primary'" v-on:click="selectQrType('sms')">
            SMS
            <input type="radio" value="sms" class="w-0">
          </CButton>
          <CButton :color="selectedQrType == 'email' ? 'info' : 'primary'" v-on:click="selectQrType('email')">
            Email
            <input type="radio" value="email" class="w-0">
          </CButton>
          <CButton :color="selectedQrType == 'card' ? 'info' : 'primary'" v-on:click="selectQrType('card')">
            Card
            <input type="radio" value="card" class="w-0">
          </CButton>
        </CButtonGroup>

        <div class="mt-3">
          <div class="qrcode-text-form" v-show="showTextForm">
            <TextForm></TextForm>
          </div>

          <div id="qrcode-email-form" v-show="showEmailForm">
            <EmailForm></EmailForm>
          </div>

          <div id="qrcode-card-form" v-show="showCardForm">
            <CardForm :work_phone="work_phone" @update-work-phone="updateWorkPhone"></CardForm>
          </div>

          <div id='qr-colors-section'>

          </div>
        </div>

        <div class="mt-3 mb-3 text-center">
          <CButton id="btn_create_qr" color="primary" size="lg" class="mt-3" v-on:click="createQR()">
            Create QR
          </CButton>
        </div>
      </div>
      <div id="qrcode-img" class="col-md-3 text-center">
        <img v-bind:src=qrImageSrc class="w-100" />
        <CButton id="btn_save_qr" color="primary" size="lg" class="mt-3" v-on:click="downloadQr()">
          Download
        </CButton>
      </div>
    </div>
  </div>
</template>

<script>

import TextForm from "../qr/TextForm";
import CardForm from "../qr/CardForm";
import EmailForm from "../qr/EmailForm";

export default {
  name: 'Dashboard',
  components: {
    TextForm,
    EmailForm,
    CardForm
  },
  data () {
    return {
      showTextForm: true,
      showEmailForm: false,
      showCardForm: false,
      selectedQrType: 'url',
      qrImageSrc: 'img/brand/qr-logo.png',
      work_phone: '',
    }
  },
  methods: {
    selectQrType(type) {
      this.selectedQrType = type;
      this.showForm();
    },
    showForm() {
      switch (this.selectedQrType) {
        case 'email':
          this.showTextForm = false;
          this.showEmailForm = true;
          this.showCardForm = false;
          break;
        case 'card':
          this.showTextForm = false;
          this.showEmailForm = false;
          this.showCardForm = true;
          break;
        default:
          this.showTextForm = true;
          this.showEmailForm = false;
          this.showCardForm = false;
          break;
      }
    },
    downloadQr() {
      var qr_tag = document.createElement('a');
      qr_tag.href = this.qrImageSrc;
      qr_tag.download = 'qr_code.png';
      qr_tag.click();
    },
    updateWorkPhone(phone) {
      this.work_phone = phone;
    },
    createQR() {
      console.log(this.work_phone);
    }
  }
}

</script>
