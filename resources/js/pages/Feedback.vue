<template>
  <default-layout>
    <div class="row m-sm-3">
      <div class="col-lg-12">
        <v-card elevation="8" class="p-4 rounded-lg">
          <v-form
            ref="feedback_form"
            v-model="valid"
            lazy-validation
          >
            <v-row>
              <v-col cols="12">
                <v-text-field label="Email" name="email" v-model="feedback_form.email" type="email"
                              :rules="[rules.emailRules('Email', feedback_form.email)]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <v-textarea label="Enter your message" name="message" v-model="feedback_form.message"
                              :rules="[rules.textRules('message', feedback_form.message)]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <v-btn
                  @click="submit"
                  class="primary"
                >
                  Submit
                </v-btn>
              </v-col>
            </v-row>
          </v-form>
        </v-card>
        <v-snackbar
          v-model="snackbar.visibility"
          :timeout="snackbar.timeout"
          :color="snackbar.color"
        >
          {{ snackbar.text }}
          <template v-slot:action="{ attrs }">
            <v-btn
              color="blue"
              text
              v-bind="attrs"
              @click="snackbar.visibility = false"
            >
            </v-btn>
          </template>
        </v-snackbar>
      </div>
    </div>
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';

export default {
  name: "Feedback",
  data () {
    return {
      valid: true,
      feedback_form: {},
      snackbar: {
        visibility: false,
        text: 'An error has occurred',
        timeout: 2000,
        color: 'red'
      },
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
  components: {
    DefaultLayout
  },
  methods: {
    validateForm() {
      return this.$refs.feedback_form.validate();
    },
    submit: function() {
      if (!this.validateForm()) return;
      axios.post('/feedback')
        .then(res => {
          this.snackbar.visibility = true
          this.snackbar.text = 'Thanks for your feedback'
          this.snackbar.color = 'blue'
        }).catch(err => {
          this.snackbar.visibility = true
          this.snackbar.text = 'An error has occurred'
          this.snackbar.color = 'red'
        }
      )
    }
  }
};
</script>
