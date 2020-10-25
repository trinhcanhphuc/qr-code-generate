<template>
  <div class="container">
    <div class="row m-3">
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
                    <TextForm
                      :text_form_data="text_form_data"
                      @update-text-form-data="updateTextFormData"
                    ></TextForm>
                  </div>

                  <div v-show="selectedQrType === 'url'">
                    <UrlForm
                      :url_form_data="url_form_data"
                      @update-url-form-data="updateUrlFormData"
                    ></UrlForm>
                  </div>

                  <div v-show="selectedQrType === 'phone'">
                    <PhoneForm
                      :phone_form_data="phone_form_data"
                      @update-phone-form-data="updatePhoneFormData"
                    ></PhoneForm>
                  </div>

                  <div v-show="selectedQrType === 'sms'">
                    <SmsForm
                      :sms_form_data="sms_form_data"
                      @update-sms-form-data="updateSmsFormData"
                    ></SmsForm>
                  </div>

                  <div v-show="selectedQrType === 'email'">
                    <EmailForm
                      :email_form_data="email_form_data"
                      @update-email-form-data="updateEmailFormData"
                    ></EmailForm>
                  </div>

                  <div v-show="selectedQrType === 'business_card'">
                    <CardForm
                      :card_form_data="card_form_data"
                      @update-card-form-data="updateCardFormData"
                    ></CardForm>
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
                        @update-color="updateForegroundColor"
                      ></ColorForm>
                    </div>
                    <div class="col-md-6">
                      <div class="text-center my-3">Background Color</div>
                      <ColorForm
                        :color_form_data="background_color"
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
                    class="mt-3 mb-3"
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
            >Create QR
            </v-btn
            >
          </div>
        </v-card>
      </div>
      <div id="qrcode-img" class="col-md-3 text-center">
        <v-card elevation="8" class="p-4 rounded-lg">
          <img v-bind:src="qrImageSrc" class="w-100"/>
          <v-btn
            id="btn_save_qr"
            color="primary"
            size="lg"
            class="mt-3"
            v-on:click="downloadQr()"
          >Download
          </v-btn
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
  },
  data() {
    return {
      panel: [0],
      selectedQrType: 'url',
      qrImageSrc: 'img/brand/qr-logo.png',
      card_form_data: {
        full_name: '',
        email: '',
        work_phone: '',
        private_phone: '',
        cell_phone: '',
        address_label: '',
        address_postcode: '',
        address_street: '',
        address_town: '',
        address_region: '',
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
        body: ''
      },
      background_color: '#FFFFFF',
      foreground_color: '#000000',
      logo_form_data: {
        logo_src: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg=='
      },
      qr_types: ['url', 'text', 'phone', 'sms', 'email', 'business_card']
    };
  },
  methods: {
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

  var aRgbHex = this.match(/.{1,2}/g);
  var aRgb = [
    parseInt(aRgbHex[0], 16),
    parseInt(aRgbHex[1], 16),
    parseInt(aRgbHex[2], 16)
  ];
  return aRgb;
}
</script>
