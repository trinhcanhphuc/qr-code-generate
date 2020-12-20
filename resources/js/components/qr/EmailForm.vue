<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field label="To" name="email" :value="email_form_data.email" type="email"
                      @keyup="updateFormData('email', $event.target.value)" placeholder="example@email.com"
                      :rules="[rules.emailRules('To', email_form_data.email)]"
          :disabled="disabled_input"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Cc" name="cc" :value="email_form_data.cc" type="email"
                      @keyup="updateFormData('cc', $event.target.value)" placeholder="example@email.com"
                      :rules="[rules.emailRules('Cc', email_form_data.cc)]"
          :disabled="disabled_input"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Bcc" name="bcc" :value="email_form_data.bcc" type="email"
                      @keyup="updateFormData('bcc', $event.target.value)" placeholder="example@email.com"
                      :rules="[rules.emailRules('Bcc', email_form_data.bcc)]"
          :disabled="disabled_input"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Subject" name="subject" :value="email_form_data.subject"
                      @keyup="updateFormData('subject', $event.target.value)" placeholder="Greeting!"
                      :rules="[rules.textRules('Subject', email_form_data.subject)]"
          :disabled="disabled_input"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-textarea
          id="qrcode-text"
          label="Body"
          name="body" :value="email_form_data.body"
          @keyup="updateFormData('body', $event.target.value)"
          placeholder="Today, I write this email to inform"
          rows="2"
          :rules="[rules.textRules('Body', email_form_data.body)]"
          :disabled="disabled_input"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'EmailForm',
  props: {
    email_form_data: {
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
        textRules(fieldName, v) {
          if (v)
            return true
          else
            return fieldName + ' is required';
        },
        emailRules(fieldName, v) {
          if (!(v)) return fieldName + ' is required';
          if (!(/.+@.+\..+/.test(v))) return fieldName + ' must be valid';
          return true;
        }
      }
    }
  },
  methods: {
    updateFormData(key, value) {
      let formData = this.email_form_data;
      formData[key] = value;
      this.$emit('update-email-form-data', formData);
    },
  },
};
</script>

