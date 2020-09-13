<template>
  <div>
    <div class="row m-0">
      <div class="col-md-9 px-3">
        <input name="token" type="hidden" value />
        <v-btn-toggle>
          <v-btn value="url" v-on:click="selectQrType('url')">URL</v-btn>
          <v-btn value="text" v-on:click="selectQrType('text')">Text</v-btn>
          <v-btn value="phone" v-on:click="selectQrType('phone')">Phone</v-btn>
          <v-btn value="sms" v-on:click="selectQrType('sms')">SMS</v-btn>
          <v-btn value="email" v-on:click="selectQrType('email')">Email</v-btn>
          <v-btn value="card" v-on:click="selectQrType('card')">Card</v-btn>
        </v-btn-toggle>

        <div class="mt-3">
          <div class="qrcode-text-form" v-show="showTextForm">
            <TextForm></TextForm>
          </div>

          <div id="qrcode-email-form" v-show="showEmailForm">
            <EmailForm></EmailForm>
          </div>

          <div id="qrcode-card-form" v-show="showCardForm">
            <CardForm :card_form_data="card_form_data" @update-card-form-data="updateCardFormData"></CardForm>
          </div>
        </div>

        <div class="mt-3 customize">
          <div id="qr-colors-section">
            <ColorForm></ColorForm>
          </div>
          <div id="qr-logo">
            <LogoForm></LogoForm>
          </div>
          <div id="qr-eyes-style">
            <EyesForm></EyesForm>
          </div>
        </div>

        <div class="mt-3 mb-3 text-center">
          <v-btn
            id="btn_create_qr"
            color="primary"
            size="lg"
            class="mt-3"
            v-on:click="createQR()"
          >Create QR</v-btn>
        </div>
      </div>
      <div id="qrcode-img" class="col-md-3 px-3 text-center">
        <img v-bind:src="qrImageSrc" class="w-100" />
        <v-btn
          id="btn_save_qr"
          color="primary"
          size="lg"
          class="mt-3"
          v-on:click="downloadQr()"
        >Download</v-btn>
      </div>
    </div>
  </div>
</template>

<script>
import TextForm from "../components/qr/TextForm";
import CardForm from "../components//qr/CardForm";
import EmailForm from "../components//qr/EmailForm";
import ColorForm from "../components//qr/ColorForm";
import LogoForm from "../components//qr/LogoForm";
import EyesForm from "../components//qr/EyesForm";

export default {
  name: "Dashboard",
  components: {
    TextForm,
    EmailForm,
    CardForm,
    ColorForm,
    LogoForm,
    EyesForm,
  },
  data() {
    return {
      showTextForm: true,
      showEmailForm: false,
      showCardForm: false,
      selectedQrType: "url",
      qrImageSrc: "img/brand/qr-logo.png",
      card_form_data: {
        full_name: "",
        email: "",
        work_phone: "",
        private_phone: "",
        cell_phone: "",
        address_label: "",
        address_postcode: "",
        address_street: "",
        address_town: "",
        address_region: "",
        address_country: "",
      },
    };
  },
  methods: {
    selectQrType(type) {
      this.selectedQrType = type;
      this.showForm();
    },
    showForm() {
      switch (this.selectedQrType) {
        case "email":
          this.showTextForm = false;
          this.showEmailForm = true;
          this.showCardForm = false;
          break;
        case "card":
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
      var qr_tag = document.createElement("a");
      qr_tag.href = this.qrImageSrc;
      qr_tag.download = "qr_code.png";
      qr_tag.click();
    },
    updateCardFormData(cardFormData) {
      this.card_form_data = cardFormData;
    },
    createQR() {
      console.log(this.card_form_data);
    },
  },
};
</script>
