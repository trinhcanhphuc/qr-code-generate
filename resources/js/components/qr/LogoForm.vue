<template>
  <div class="row m-0">
    <v-img
      ref="qrLogoUpload"
      style="height: 100px; width: 100px"
      :src="uploadedLogoSrc"
      alt="Your QR logo"
    />
    <div class="ml-3 my-auto" style="position: relative;">
      <input
        ref="btnUploadLogo"
        @change="readURL"
        type="file"
        accept=".jpg, .png, .svg, .jpeg"
        style="width: 30px; opacity: 0;"
      />
      <v-btn
        @click="$refs.btnUploadLogo.click()"
        color="primary"
        style="position: absolute; z-index: 1; left: 0;"
      >Upload</v-btn>
    </div>
  </div>
</template>

<script>
export default {
  name: "LogoForm",
  data() {
    return {
      uploadedLogoSrc:
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==",
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
        reader.onload = (e) => {
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
    },
  },
};
</script>