<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field
          @keyup="updateFormData('phone', $event.target.value)" label="Phone Number" type="tel" placeholder="+84 *******" />
        <v-textarea
          @keyup="updateFormData('message', $event.target.value)" label="Your Message" placeholder="Hello!" rows="2" />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'SmsForm',
  props: {
    sms_form_data: {
      type: Object,
      required: true,
    },
  },
  methods: {
    updateFormData(key, value) {
      let formData = this.sms_form_data;
      formData[key] = value;
      this.$emit('update-sms-form-data', formData);
    },
  },
};
</script>
