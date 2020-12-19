<template>
  <v-card class="py-3">
    <div
      v-for="(qr_result, i) in qr_results"
      :key="i"
    >
      <v-card class="m-3">
        <v-row>
          <v-col md="3" sm="2">
            <v-img
              :lazy-src="'/qr_images/' + qr_result.image_name + '.' + qr_result.image_extension"
              max-height="100"
              max-width="100"
              :src="'/qr_images/' + qr_result.image_name + '.' + qr_result.image_extension"
              class="m-auto"
            ></v-img>
          </v-col>
          <v-col md="7" sm="9">
          <v-chip>{{ qr_result.type }}</v-chip>
          <div>{{ qr_result.created_at }}</div>
          </v-col>
          <v-col md="2" sm="1" class="text-right">
            <v-menu
              bottom
              left
            >
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  icon
                  v-bind="attrs"
                  v-on="on"
                >
                  <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
              </template>

              <v-list>
                <v-list-item-group>
                  <v-list-item
                    @click="showQrResult(qr_result)"
                  >
                    Detail
                  </v-list-item>
                </v-list-item-group>
                <v-list-item-group>
                  <v-list-item
                    @click="deleteQrResult(qr_result)"
                  >
                    Delete
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-menu>
          </v-col>
        </v-row>
      </v-card>
    </div>

    <v-dialog
      v-model="dialog_detail.visibility"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title>
          <span class="headline">QR Result Detail</span>
        </v-card-title>
        <v-card class="m-5">
          <v-img :src="qr_result_img"></v-img>
        </v-card>
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
                    ></ColorForm>
                  </div>
                  <div class="col-md-6">
                    <div class="text-center my-3">Background Color</div>
                    <ColorForm
                      :color_form_data="background_color"
                      :default_color="default_background_color"
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
                  >
                  </LogoForm>
                </div>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panel>
        </v-expansion-panels>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog_detail.visibility = false"
          >
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-snackbar
      v-model="snackbar.visibility"
      :timeout="snackbar.timeout"
      :color="snackbar.color"
    >
      {{ snackbar.text }}
      <template v-slot:action="{ attrs }">
        <v-btn
          color="blue"
          text
          v-bind="attrs"
          @click="snackbar.visibility = false"
        >
        </v-btn>
      </template>
    </v-snackbar>
  </v-card>
</template>

<script>
import ColorForm from "../components/qr/ColorForm";
import LogoForm from "../components/qr/LogoForm";
import TextForm from "../components/qr/TextForm";
import UrlForm from "../components/qr/UrlForm";
import PhoneForm from "../components/qr/PhoneForm";
import SmsForm from "../components/qr/SmsForm";
import CardForm from "../components/qr/CardForm";
import EmailForm from "../components/qr/EmailForm";

export default {
  name: 'HistoryTab',
  components: {
    TextForm,
    UrlForm,
    PhoneForm,
    SmsForm,
    EmailForm,
    CardForm,
    ColorForm,
    LogoForm
  },
  props: {},
  data() {
    return {
      valid: true,
      qr_results: [],
      options: [
        { title: 'Detail' },
        { title: 'Delete' }
      ],
      background_color: '#FFFFFF',
      foreground_color: '#000000',
      default_background_color: '#FFFFFF',
      default_foreground_color: '#000000',
      logo_form_data: {
        logo_src: ''
      },
      dialog_detail: {
        visibility: false
      },
      qr_type: 'url',
      qr_result_img: '',
      panel: [0],
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
      },
      snackbar: {
        visibility: false,
        text: 'An error has occurred',
        timeout: 2000,
        color: 'red'
      }
    }
  },
  mounted: function() {
    axios.post('/user/history')
      .then(res => {
        this.qr_results = res.data.qr_results

      }).catch(err => {
        console.log(err);
      }
    );
  },
  methods: {
    showQrResult(qr_result) {

      this.qr_type = qr_result.type
      this.qr_result_img = '/qr_images/' + qr_result.image_name + '.' + qr_result.image_extension
      let qr_data = JSON.parse(qr_result.form_data)
      switch (this.qr_type) {
        case 'url':
          this.url_form_data = qr_data
        case 'text':
          this.text_form_data = qr_data
        case 'phone':
          this.phone_form_data = qr_data
        case 'sms':
          this.sms_form_data = qr_data
        case 'email':
          this.email_form_data = qr_data
        case 'business_card':
          this.card_form_data = qr_data
      }

      this.dialog_detail.visibility = true
    },
    deleteQrResult(qr_result) {
      axios.delete('/user/qr-results/' + qr_result.id)
        .then(res => {
          this.snackbar.visibility = true
          this.snackbar.text = 'QR ' + qr_result.id + ' has been deleted succesfully'
          this.snackbar.color = 'blue'
          this.qr_results.splice(this.qr_results.indexOf(qr_result), 1)
        }).catch(err => {
          this.snackbar.visibility = true
          this.snackbar.text = 'An error has occurred'
          this.snackbar.color = 'red'
        }
      );
    },
  }
}
</script>
