<template>
  <div style="position: relative;">
    <div class="rounded-lg m-auto" style="width: 200px; height: 200px;">
      <v-img
        src="/img/sample_image.png"
        style="position: absolute; z-index: 0; width: 200px; height: 200px;">
      </v-img>
      <v-img
        ref="qrLogoUpload"
        height="200"
        width="200"
        :src="logo_src"
        alt="Your QR logo"
      />
      <div class="ml-3 my-auto">
        <input
          ref="btnUploadLogo"
          @change="updateFormData('logo_src', $event.target.value)"
          type="file"
          accept=".jpg, .png, .svg, .jpeg"
          style="width: 30px; opacity: 0; position: absolute; left: calc(50% - 16px); bottom: -16px"
          :disabled="disabled_input"
        />
        <v-btn class="mx-2" fab dark x-small color="red"
               @click="removeLogo()"
               style="position: absolute; z-index: 1; left: calc(50% + 75px); top: -15px"
          v-if="remove_button"
        >
          <v-icon dark>mdi-close</v-icon>
        </v-btn>
        <v-btn
          elevation="2"
          fab
          x-small
          @click="$refs.btnUploadLogo.click()"
          style="position: absolute; z-index: 1; left: calc(50% - 16px); bottom: -16px"
        >
          <v-icon small>mdi-camera-enhance</v-icon>
        </v-btn>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LogoForm",
  props: {
    logo_form_data: {
      type: Object,
      required: true,
    },
    disabled_input: {
      type: Boolean,
      required: false,
      default: false
    },
    show_remove_button: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  data() {
    return {
      logo_src: this.logo_form_data.logo_src,
      remove_button: false
    }
  },
  watch: {
    show_remove_button: [{
      handler: 'initRemoveButton'
    }]
  },
  methods: {
    initRemoveButton(show_remove_button) {
      this.remove_button =show_remove_button
    },
    removeLogo() {
      this.logo_src = ''
      let formData = this.logo_form_data
      formData.logo_src = ''
      this.$emit('update-logo-form-data', formData)
      this.remove_button = false
    },
    updateFormData(key, value) {
      let formData = this.logo_form_data
      let inputLogo = this.$refs.btnUploadLogo
      if (inputLogo.files && inputLogo.files[0]) {
        let reader = new FileReader()
        reader.onload = e => {
          formData[key] = e.target.result
          this.logo_src = formData[key]
          this.$emit('update-logo-form-data', formData)
        }
        reader.readAsDataURL(inputLogo.files[0])
        this.remove_button = true
      }
    }
  }
};
</script>
