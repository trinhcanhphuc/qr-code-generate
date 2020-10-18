<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field
          id="qrcode-text"
          label="URL"
          :value="url_form_data.text"
          @keyup="updateFormData('url', $event.target.value)"
          placeholder="https://www.facebook.com/"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'UrlForm',
  props: {
    url_form_data: {
      type: Object,
      required: true,
    },
  },
  methods: {
    updateFormData(key, value) {
      let formData = this.url_form_data;
      formData[key] = value;
      this.$emit('update-url-form-data', formData);
    },
  },
};
</script>

