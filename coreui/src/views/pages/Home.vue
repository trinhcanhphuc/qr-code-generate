<template>
  <div>
    <div class="row">
      <div class="col-md-9">
        <input name="token" type="hidden" value="" />
        <CButtonGroup class="w-100 d-flex" size="lg">
          <CButton color="primary" v-on:click="showForm('url')">
            URL
            <input type="radio" value="url" class="w-0">
          </CButton>
          <CButton color="primary" v-on:click="showForm('text')">
            Text
            <input type="radio" value="text" class="w-0">
          </CButton>
          <CButton color="primary" v-on:click="showForm('phone')">
            Phone
            <input type="radio" value="phone" class="w-0">
          </CButton>
          <CButton color="primary" v-on:click="showForm('sms')">
            SMS
            <input type="radio" value="sms" class="w-0">
          </CButton>
          <CButton color="primary" v-on:click="showForm('email')">
            Email
            <input type="radio" value="email" class="w-0">
          </CButton>
          <CButton color="primary" v-on:click="showForm('card')">
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
            <CardForm></CardForm>
          </div>

          <div id='qr-colors-section'>

          </div>
        </div>
      </div>
      <div id="qrcode-img" class="col-md-3 text-center">
        <img src="img/brand/qr-logo.png" class="w-100" />
        <CButton id="btn_save_qr" color="primary" size="lg" class="mt-3">
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
    }
  },
  methods: {
    showForm(value) {
      switch (value) {
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
    }
  }
}

</script>
