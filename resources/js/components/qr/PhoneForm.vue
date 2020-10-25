<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Phone Number" :value="phone_form_data.phone" type="tel"
                      @keyup="updateFormData('phone', $event.target.value)" placeholder="+84 *******"
                      :rules="[rules.phoneRules('Phone Number', phone_form_data.work_phone)]"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'PhoneForm',
  props: {
    phone_form_data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      rules: {
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
      let formData = this.phone_form_data;
      formData[key] = value;
      this.$emit('update-phone-form-data', formData);
    },
  },
};
</script>

