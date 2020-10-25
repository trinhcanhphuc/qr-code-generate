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
        />
        <v-btn class="mx-2" fab dark x-small color="red"
               @click="removeLogo()"
               style="position: absolute; z-index: 1; left: calc(50% + 75px); top: -15px"
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
          <v-icon small>fas fa-camera</v-icon>
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
  },
  data() {
    return {
      logo_src: this.logo_form_data.logo_src
    }
  },
  methods: {
    removeLogo() {
      this.logo_src = '';
      let formData = this.logo_form_data;
      formData.logo_src = '';
      this.$emit('update-logo-form-data', formData);
    },
    updateFormData(key, value) {
      let formData = this.logo_form_data;
      let inputLogo = this.$refs.btnUploadLogo;
      if (inputLogo.files && inputLogo.files[0]) {
        let reader = new FileReader();
        reader.onload = e => {
          formData[key] = e.target.result;
          this.logo_src = formData[key];
          this.$emit('update-logo-form-data', formData);
        };
        reader.readAsDataURL(inputLogo.files[0]);
      }
    }
  }
};
</script>
