<template>
  <default-layout>
    <div class="row">
      <div class="col-12 mt-5">
        <h1 class="text-center">Sign Up</h1>
      </div>
    </div>
    <div class="row m-3 mt-0 justify-content-center">
      <div class="col-md-8">
        <v-card elevation="8" class="p-4 rounded-lg">
          <v-row>
            <v-col cols="12">
              <v-text-field label="Full Name" name="name" :value="signup_form_data.name" type="name"
                            @keyup="updateFormData('name', $event.target.value)" placeholder="John Doe"
                            :rules="[rules.textRules('Name', signup_form_data.name)]"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <v-text-field label="Email" name="email" :value="signup_form_data.email" type="email"
                            @keyup="updateFormData('email', $event.target.value)" placeholder="example@email.com"
                            :rules="[rules.emailRules('Email', signup_form_data.email)]"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <v-text-field label="Password" name="password" :value="signup_form_data.password" type="password"
                            @keyup="updateFormData('password', $event.target.value)" placeholder="********"
                            :rules="[rules.textRules('Password', signup_form_data.password)]"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <v-text-field label="Confirm Password" name="confirm_password" :value="signup_form_data.confirm_password" type="password"
                            @keyup="updateFormData('confirm_password', $event.target.value)" placeholder="********"
                            :rules="[rules.textRules('Confirm Password', signup_form_data.confirm_password)]"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <v-btn
                color="primary"
                block
                v-on:click="signup()"
              >
                Sign Up
              </v-btn>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <router-link
                to='/login'
              >
                Login to account
              </router-link>
            </v-col>
          </v-row>
        </v-card>
      </div>
    </div>
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';

export default {
  name: "SignUp",
  components: {
    DefaultLayout
  },
  data() {
    return {
      signup_form_data: {
        'name': '',
        'email': '',
        'password': '',
        'confirm_password': ''
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
  methods: {
    updateFormData(key, value) {
      let formData = this.signup_form_data;
      formData[key] = value;
      this.$emit('update-signup-form-data', formData);
    },
    signup() {
      console.log('signup');
    }
  },
};
</script>
