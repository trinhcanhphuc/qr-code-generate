<template>
  <div>
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
          v-for="link in links"
          :key="link"
          text
        >
          {{ link }}
        </v-btn>
      </v-container>
    </v-app-bar>
    <div class="container mt-16 mb-16 scroll-y">
      <div class="row">
        <div class="col-12 mt-5">
          <h1 class="text-center">QR Generator</h1>
        </div>
      </div>
      <div class="row m-3 mt-0">
        <div class="col-md-9">
          <v-card elevation="8" class="p-4 rounded-lg">
            <input name="token" type="hidden" value/>
            <v-slide-group show-arrows>
              <v-slide-item
                v-for="type in qr_types"
                :key="type"
                v-slot:default="{ active, toggle }"
              >
                <v-btn
                  class="mx-2"
                  :input-value="active"
                  v-bind:class="{ 'purple white--text': selectedQrType === type }"
                  depressed
                  rounded
                  @click="changeQrType(type)"
                >{{ type }}
                </v-btn
                >
              </v-slide-item>
            </v-slide-group>


            <v-expansion-panels
              v-model="panel"
              focusable
              multiple
              class="mt-8 mb-5"
            >
              <v-expansion-panel
                :value="0"
              >
                <v-expansion-panel-header>Input Data</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <div class="mt-3">
                    <div v-show="selectedQrType === 'text'">
                      <v-form
                        ref="text_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <TextForm
                          :text_form_data="text_form_data"
                          @update-text-form-data="updateTextFormData"
                        ></TextForm>
                      </v-form>
                    </div>

                    <div v-show="selectedQrType === 'url'">
                      <v-form
                        ref="url_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <UrlForm
                          :url_form_data="url_form_data"
                          @update-url-form-data="updateUrlFormData"
                        ></UrlForm>
                      </v-form>
                    </div>

                    <div v-show="selectedQrType === 'phone'">
                      <v-form
                        ref="phone_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <PhoneForm
                          :phone_form_data="phone_form_data"
                          @update-phone-form-data="updatePhoneFormData"
                        ></PhoneForm>
                      </v-form>
                    </div>

                    <div v-show="selectedQrType === 'sms'">
                      <v-form
                        ref="sms_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <SmsForm
                          :sms_form_data="sms_form_data"
                          @update-sms-form-data="updateSmsFormData"
                        ></SmsForm>
                      </v-form>
                    </div>

                    <div v-show="selectedQrType === 'email'">
                      <v-form
                        ref="email_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <EmailForm
                          :email_form_data="email_form_data"
                          @update-email-form-data="updateEmailFormData"
                        ></EmailForm>
                      </v-form>
                    </div>

                    <div v-show="selectedQrType === 'business_card'">

                      <v-form
                        ref="card_form"
                        v-model="valid"
                        lazy-validation
                      >
                        <CardForm
                          :card_form_data="card_form_data"
                          @update-card-form-data="updateCardFormData"
                        ></CardForm>
                      </v-form>
                    </div>
                  </div>
                </v-expansion-panel-content>

                <v-expansion-panel>
                  <v-expansion-panel-header>Custom Colors</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="text-center my-3">Foreground Color</div>
                        <ColorForm
                          :color_form_data="foreground_color"
                          :default_color="default_foreground_color"
                          @update-color="updateForegroundColor"
                        ></ColorForm>
                      </div>
                      <div class="col-md-6">
                        <div class="text-center my-3">Background Color</div>
                        <ColorForm
                          :color_form_data="background_color"
                          :default_color="default_background_color"
                          @update-color="updateBackgroundColor"
                        ></ColorForm>
                      </div>
                    </div>
                  </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                  <v-expansion-panel-header>QR Logo</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <div
                      id="qr-logo"
                      class="mt-8 mb-5"
                      style="margin-bottom: 20px"
                    >
                      <LogoForm
                        :logo_form_data="logo_form_data"
                        @update-logo-form-data="updateLogoFormData"
                      >
                      </LogoForm>
                    </div>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panel>
            </v-expansion-panels>

            <div class="mt-3 mb-3 text-center">
              <v-btn
                id="btn_create_qr"
                color="primary"
                size="lg"
                block
                v-on:click="createQR()"
              >Generate QR Code
              </v-btn
              >
            </div>
          </v-card>
        </div>
        <div id="qrcode-img" class="col-md-3 text-center">
          <v-card elevation="8" class="p-4 rounded-lg">
            <v-btn class="mx-2" fab dark x-small
                   @click="is_qr_full_screen = true"
                   style="position: absolute; z-index: 1; left: calc(100% - 24px); top: -16px"
            >
              <v-icon>fas fa-expand-arrows-alt</v-icon>
            </v-btn>
            <img v-bind:src="qrImageSrc" class="w-100"/>
            <v-btn
              id="btn_save_qr"
              color="primary"
              size="lg"
              class="mt-5"
              block
              v-on:click="downloadQr()"
            >Download
            </v-btn
            >
          </v-card>
          <v-row justify="center">
            <v-dialog
              v-model="is_qr_full_screen"
              width="400px"
            >
              <v-card>
                <v-btn class="ml-auto" fab dark x-small color="red"
                       @click="is_qr_full_screen = false" link
                       style="position: absolute; z-index: 1; left: calc(100% - 42px); top: 8px"
                >
                  <v-icon dark>mdi-close</v-icon>
                </v-btn>
                <div class="px-10 py-12">
                  <img v-bind:src="qrImageSrc" class="w-100"/>
                </div>
              </v-card>
            </v-dialog>
          </v-row>
        </div>
        <div>

        </div>
      </div>
      <HowDoQRCodeWork></HowDoQRCodeWork>
      <WhyUseQR></WhyUseQR>
      <YourQuestion></YourQuestion>
    </div>

    <v-btn
      v-scroll="onScroll"
      v-show="fab"
      fab
      dark
      fixed
      bottom
      right
      color="primary"
      @click="toTop"
    >
      <v-icon>fas fa-arrow-up</v-icon>
    </v-btn>
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
import YourQuestion from "../components/YourQuestion";
import HowDoQRCodeWork from "../components/HowDoQRCodeWork";
import WhyUseQR from "../components/WhyUseQR";

export default {
  name: "Dashboard",
  components: {
    YourQuestion,
    HowDoQRCodeWork,
    WhyUseQR,
    TextForm,
    UrlForm,
    PhoneForm,
    SmsForm,
    EmailForm,
    CardForm,
    ColorForm,
    LogoForm,
  },
  data() {
    return {
      fab: false,
      links: [
        'QR Generator',
        'QR Scanner',
        'About'
      ],
      is_qr_full_screen: false,
      valid: true,
      panel: [0],
      selectedQrType: 'url',
      qrImageSrc: 'img/brand/qr-logo.png',
      card_form_data: {
        pre_gender: 'Mr',
        first_name: 'Trinh',
        last_name: 'Phuc',
        email: 'trinhcanhphuc@gmail.com',
        work_phone: '0963783481',
        private_phone: '0963783482',
        cell_phone: '0963783483',
        address_label: 'IMT Solution',
        address_street: '55 Bau Cat 4, Ward 13, Tan Binh District',
        address_city: 'Ho Chi Minh',
        address_province: 'Ho Chi Minh 1',
        address_postcode: '700000',
        address_country: 'Viet Nam'
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
    }
  }
};

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
