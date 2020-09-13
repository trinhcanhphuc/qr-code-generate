<template>
  <div style="position: relative;">
    <div class="rounded-lg m-auto" style="width: 200px; height: 200px;">
      <v-img
        ref="qrLogoUpload"
        height="200"
        width="200"
        :src="uploadedLogoSrc"
        alt="Your QR logo"
      />
      <div class="ml-3 my-auto">
        <input
          ref="btnUploadLogo"
          @change="readURL"
          type="file"
          accept=".jpg, .png, .svg, .jpeg"
          style="width: 30px; opacity: 0; position: absolute; left: calc(50% - 16px); bottom: -16px"
        />
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
  data() {
    return {
      uploadedLogoSrc:
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg=="
    };
  },
  methods: {
    readURL() {
      console.log(this.$refs.btnUploadLogo);
      console.log(this.$refs.btnUploadLogo.files);
      var inputLogo = this.$refs.btnUploadLogo;
      var qrLogoUpload = this.$refs.qrLogoUpload;
      if (inputLogo.files && inputLogo.files[0]) {
        var reader = new FileReader();
        reader.onload = e => {
          this.uploadedLogoSrc = e.target.result;
        };
        reader.readAsDataURL(inputLogo.files[0]);
      }
      /*if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }*/
    }
  }
};
</script>
