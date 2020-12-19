<template>
  <div class="m-3">
    <v-form
      ref="profile_form"
      v-model="valid"
      lazy-validation
    >
      <v-row>
        <v-col cols="12">
          <v-text-field label="Full Name" name="name" v-model="updated_profile_form_data.name"
                        :rules="[rules.textRules('Full Name', updated_profile_form_data.name)]"
          />
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <v-text-field label="Email" name="email" v-model="updated_profile_form_data.email" type="email" disabled
                        :rules="[rules.emailRules('Email', updated_profile_form_data.email)]"
          />
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          <v-btn
            @click="saveProfile"
            class="primary"
          >
            Save
          </v-btn>
          <v-btn @click="reset">
            Reset
          </v-btn>
        </v-col>
      </v-row>
    </v-form>
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
</template>

<script>
export default {
  name: 'ProfileTab',
  props: {
    profile_form_data: {
      type: Object,
      required: true,
    }
  },
  data() {
    return {
      valid: true,
      original_profile_form_data: {},
      updated_profile_form_data: {},
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
      },
      snackbar: {
        visibility: false,
        text: 'An error has occurred',
        timeout: 2000,
        color: 'red'
      }
    }
  },
  watch: {
    profile_form_data: [{
      handler: 'initProfileData'
    }]
  },
  methods: {
    initProfileData(profile_form_data) {
      this.original_profile_form_data = {
        'name': profile_form_data.name,
        'email': profile_form_data.email
      }
      this.updated_profile_form_data = {
        'name': profile_form_data.name,
        'email': profile_form_data.email
      }
    },
    saveProfile() {
      axios.post('/user/profile', this.updated_profile_form_data)
      .then(res => {
        this.snackbar.visibility = true
        this.snackbar.text = 'User Profile has been updated succesfully'
        this.snackbar.color = 'blue'
        window.location.reload()
      }).catch(err => {
        this.snackbar.visibility = true
        this.snackbar.text = 'An error has occurred'
        this.snackbar.color = 'red'
      }
    );
    },
    reset() {
      this.updated_profile_form_data = {
        'name': this.original_profile_form_data.name,
        'email': this.original_profile_form_data.email
      }
    }
  }
}
</script>
