<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-textarea label="Text" :value="text_form_data.text"
                    @keyup="updateFormData('text', $event.target.value)" placeholder="Fill in your text" rows="2"/>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'TextForm',
  props: {
    text_form_data: {
      type: Object,
      required: true,
    },
  },
  methods: {
    updateFormData(key, value) {
      let formData = this.text_form_data;
      formData[key] = value;
      this.$emit('update-text-form-data', formData);
    },
  },
};
</script>
