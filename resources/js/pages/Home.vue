<template>
  <default-layout>
    <div class="row m-sm-3 mt-md-5">
      <div class="col-lg-9">
        <v-card elevation="8" class="p-4 rounded-lg">
          <input name="token" type="hidden" value/>
          <v-tabs
            primary
            show-arrows
            v-model="qr_type"
          >
            <v-tab
              v-for="qr_type in qr_types"
              :key="qr_type"
              @click="changeqr_type(qr_type)"
              :href="`#${qr_type}`"
              class="nounderline"
            >
              {{ qr_type }}
            </v-tab>
          </v-tabs>
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
                    <div v-show="qr_type === 'text'">
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

                    <div v-show="qr_type === 'url'">
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

                    <div v-show="qr_type === 'phone'">
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

                    <div v-show="qr_type === 'sms'">
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

                    <div v-show="qr_type === 'email'">
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

                    <div v-show="qr_type === 'business_card'">
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
              color="primary"
              size="lg"
              block
              v-on:click="createQR()"
            >Create QR Code
            </v-btn>
          </div>
        </v-card>
      </div>
      <div id="qrcode-img" class="col-lg-3 text-center m-auto" style='max-width: 400px'>
        <v-card elevation="8" class="p-4 rounded-lg">
          <v-btn class="mx-2 hidden-sm-and-down" fab dark x-small
            @click="is_qr_full_screen = true"
            style="position: absolute; z-index: 1; left: calc(100% - 24px); top: -16px"
          >
            <v-icon>mdi-arrow-expand</v-icon>
          </v-btn>
          <img v-bind:src="qr_image_src" class="w-100"/>
        </v-card>
        <div class="qr-action-btns mt-5">
          <v-btn
            id="btn_save_qr"
            color="green"
            dark
            fab
            style="float: left"
            v-on:click="downloadQr()"
          >
            <v-icon>mdi-download</v-icon>
          </v-btn>
          <v-speed-dial
            v-model="btn_share_property.fab"
            :direction="btn_share_property.direction"
            :open-on-hover="btn_share_property.hover"
            :transition="btn_share_property.transition"
            style="float: right"
          >
            <template v-slot:activator>
              <v-btn
                v-model="btn_share_property.fab"
                color="blue darken-2"
                dark
                fab
              >
                <v-icon v-if="btn_share_property.fab">
                  mdi-close
                </v-icon>
                <v-icon v-else>
                  mdi-share
                </v-icon>
              </v-btn>
            </template>
            <v-btn
              fab
              dark
              small
              color="blue"
              v-on:click="shareToSocial('TW')"
            >
              <v-icon>mdi-twitter</v-icon>
            </v-btn>
            <v-btn
              fab
              dark
              small
              color="indigo"
              v-on:click="shareToSocial('FB')"
            >
              <v-icon>mdi-facebook</v-icon>
            </v-btn>
          </v-speed-dial>
        </div>
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
                <img v-bind:src="qr_image_src" class="w-100"/>
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
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';
import ColorForm from "../components/qr/ColorForm";
import LogoForm from "../components/qr/LogoForm";
import YourQuestion from "../components/YourQuestion";
import HowDoQRCodeWork from "../components/HowDoQRCodeWork";
import WhyUseQR from "../components/WhyUseQR";
import TextForm from "../components/qr/TextForm";
import UrlForm from "../components/qr/UrlForm";
import PhoneForm from "../components/qr/PhoneForm";
import SmsForm from "../components/qr/SmsForm";
import CardForm from "../components/qr/CardForm";
import EmailForm from "../components/qr/EmailForm";

export default {
  name: "Home",
  components: {
    DefaultLayout,
    TextForm,
    UrlForm,
    PhoneForm,
    SmsForm,
    EmailForm,
    CardForm,
    YourQuestion,
    HowDoQRCodeWork,
    WhyUseQR,
    ColorForm,
    LogoForm
  },
  data() {
    return {
      valid: true,
      btn_share_property: {
        direction: 'top',
        fab: false,
        fling: false,
        hover: false,
        tabs: null,
        transition: 'slide-y-reverse-transition',
      },
      is_qr_full_screen: false,
      panel: [0],
      qr_image_src: 'img/brand/qr-logo.png',
      background_color: '#FFFFFF',
      foreground_color: '#000000',
      default_background_color: '#FFFFFF',
      default_foreground_color: '#000000',
      logo_form_data: {
        logo_src: ''
      },
      qr_types: ['url', 'text', 'phone', 'sms', 'email', 'business_card'],
      qr_type: 'url',
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
      }
    }
  },
  methods: {
    validate() {
      this.$refs.form.validate()
    },
    changeqr_type(qr_type) {
      this.qr_type = qr_type;
    },
    downloadQr() {
      let qr_tag = document.createElement('a');
      qr_tag.href = this.qr_image_src;
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
        'type': this.qr_type,
        'form_data': formData,
        'fore_color': this.foreground_color.slice(1).convertToRGB(),
        'back_color': this.background_color.slice(1).convertToRGB(),
        'logo': this.logo_form_data.logo_src,
        'format': 'png'
      }
      axios.post('/qrcode/render', qrData)
        .then(res => {
          this.qr_image_src = res.data + '?' + new Date().getTime();
        }).catch(err => {
        console.log(err);
      });
    },
    validateForm() {
      switch (this.qr_type) {
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
      switch (this.qr_type) {
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
      return window.location.origin + '/' + this.qr_image_src;
    }
  }
};
</script>
