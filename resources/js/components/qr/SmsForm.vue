<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field
          @keyup="updateFormData('phone', $event.target.value)" label="Phone Number" type="tel"
          placeholder="+84 *******"
          :value="sms_form_data.phone"
          :rules="[rules.phoneRules('Phone Number', sms_form_data.phone)]"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-textarea
          @keyup="updateFormData('message', $event.target.value)"
          :value="sms_form_data.message"
          label="Your Message" placeholder="Hello!" rows="2"
          :rules="[rules.textRules('Your Message', sms_form_data.message)]"
        />
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
  data() {
    return {
      rules: {
        textRules(fieldName, v) {
          if (v)
            return true
          else
            return fieldName + ' is required';
        },
        phoneRules(fieldName, v) {
          if (!(v)) return fieldName + ' is required';
          if (!(/^[+]*[(]?[0-9]{1,4}[)]?[-\s\./0-9]*$/.test(v))) return fieldName + ' must be valid';
          return true;
        }
      }
    }
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
