<template>
  <div>
    <v-color-picker
      class="ml-auto"
      :swatches="swatches"
      :value="color_form_data"
      @update:color="updateColor"
      :show-swatches="show_swatches"
      hide-canvas
      mode="hexa"
      elevation="15"
      width="100%"
      :disabled="disabled_choose_color"
    ></v-color-picker>
    <div class="text-center mt-3">
      <v-btn
        @click="resetColor"
        :disabled="disabled_reset_button"
      >Reset</v-btn>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ColorForm',
  props: {
    color_form_data: {
      type: String,
      required: false,
    },
    default_color: {
      type: String,
      required: false
    },
    show_swatches: {
      type: Boolean,
      required: false,
      default: true
    },
    disabled_choose_color: {
      type: Boolean,
      required: false,
      default: false
    },
    disabled_reset_button: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  methods: {
    updateColor(value) {
      this.$emit('update-color', value.hex);
    },
    resetColor() {
      this.$emit('update-color', this.default_color);
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
