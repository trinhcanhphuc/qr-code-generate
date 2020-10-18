<template>
  <div class="container">
    <div class="row m-3">
      <div class="col-md-9">
        <v-card elevation="8" class="p-4 rounded-lg">
          <input name="token" type="hidden" value />
          <v-slide-group show-arrows>
            <v-slide-item
              v-for="type in qr_types"
              :key="type"
              v-slot:default="{ active, toggle }"
            >
              <v-btn
                class="mx-2"
                :input-value="active"
                v-bind:class="{ 'purple white--text': selectedQrType == type }"
                depressed
                rounded
                @click="changeQrType(type)"
                >{{ type }}</v-btn
              >
            </v-slide-item>
          </v-slide-group>

          <div class="mt-3">
            <div class="qrcode-text-form" v-show="selectedQrType == 'text'">
              <TextForm></TextForm>
            </div>

            <div class="qrcode-text-form" v-show="selectedQrType == 'url'">
              <UrlForm></UrlForm>
            </div>

            <div class="qrcode-text-form" v-show="selectedQrType == 'phone'">
              <PhoneForm></PhoneForm>
            </div>

            <div class="qrcode-text-form" v-show="selectedQrType == 'sms'">
              <SmsForm></SmsForm>
            </div>

            <div id="qrcode-email-form" v-show="selectedQrType == 'email'">
              <EmailForm></EmailForm>
            </div>

            <div id="qrcode-card-form" v-show="selectedQrType == 'card'">
              <CardForm
                :card_form_data="card_form_data"
                @update-card-form-data="updateCardFormData"
              ></CardForm>
            </div>
          </div>

          <div class="mt-3 customize">
            <div class="row">
              <div id="qr-colors-section" class="col-md-6">
                <ColorForm
                  :color_form_data="color_form_data"
                  @update-color-form-data="updateColorFormData"
                ></ColorForm>
              </div>
              <div
                id="qr-logo"
                class="col-md-6 mt-auto"
                style="margin-bottom: 20px"
              >
                <LogoForm></LogoForm>
              </div>
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
              block
              v-on:click="createQR()"
              >Create QR</v-btn
            >
          </div>
        </v-card>
      </div>
      <div id="qrcode-img" class="col-md-3 text-center">
        <v-card elevation="8" class="p-4 rounded-lg">
          <img v-bind:src="qrImageSrc" class="w-100" />
          <v-btn
            id="btn_save_qr"
            color="primary"
            size="lg"
            class="mt-3"
            v-on:click="downloadQr()"
            >Download</v-btn
          >
        </v-card>
      </div>
    </div>
  </div>
</template>

<script>
import TextForm from "../components/qr/TextForm";
import UrlForm from "../components/qr/UrlForm";
import PhoneForm from "../components/qr/PhoneForm";
import SmsForm from "../components/qr/SmsForm";
import CardForm from "../components//qr/CardForm";
import EmailForm from "../components/qr/EmailForm";
import ColorForm from "../components/qr/ColorForm";
import LogoForm from "../components/qr/LogoForm";
import EyesForm from "../components/qr/EyesForm";

export default {
  name: "Dashboard",
  components: {
    TextForm,
    UrlForm,
    PhoneForm,
    SmsForm,
    EmailForm,
    CardForm,
    ColorForm,
    LogoForm,
    EyesForm
  },
  data() {
    return {
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
        address_country: ""
      },
      color_form_data: '#000000',
      qr_types: ["url", "text", "phone", "sms", "email", "card"]
    };
  },
  methods: {
    changeQrType(qr_type) {
      this.selectedQrType = qr_type;
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
    updateColorFormData(colorFormData) {
      this.color_form_data = colorFormData;
    },
    createQR() {
      console.log(this.card_form_data);
      console.log(this.color_form_data);
    }
  }
};
</script>
