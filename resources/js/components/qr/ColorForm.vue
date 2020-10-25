<template>
  <div>
    <v-color-picker
      class="ml-auto"
      :swatches="swatches"
      :value="color_form_data"
      @update:color="updateColor"
      show-swatches
      hide-canvas
      mode="hexa"
      elevation="15"
      width="100%"
    ></v-color-picker>
  </div>
</template>

<script>
export default {
  name: 'ColorForm',
  props: {
    color_form_data: {
      type: String,
      required: false,
    }
  },
  methods: {
    updateColor(value) {
      this.$emit('update-color', value.hex);
    }
  },
  data: () => ({
    swatches: [
      ['#FF0000', '#AA0000', '#550000'],
      ['#FFFF00', '#AAAA00', '#555500'],
      ['#00FF00', '#00AA00', '#005500'],
      ['#00FFFF', '#00AAAA', '#005555'],
      ['#0000FF', '#0000AA', '#000055']
    ]
  })
};
</script>
