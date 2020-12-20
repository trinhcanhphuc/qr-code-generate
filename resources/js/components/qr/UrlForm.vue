<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field
          id="qrcode-text"
          label="URL"
          :value="url_form_data.url"
          @keyup="updateFormData('url', $event.target.value)"
          placeholder="https://www.facebook.com/"
          type="url"
          :rules="[rules.urlRules('URL', url_form_data.url)]"
          :disabled="disabled_input"
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
    disabled_input: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  data() {
    return {
      rules: {
        urlRules(fieldName, v) {
          if (!(v)) return fieldName + ' is required';
          if (!(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.?[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/.test(v))) return fieldName + ' must be valid';
          return true;
        },
      }
    }
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

