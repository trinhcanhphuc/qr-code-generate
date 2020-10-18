<template>
  <div>
    <v-color-picker
      class="ml-auto"
      :swatches="swatches"
      :value="color_form_data"
      @update:color="updateColorForm"
      show-swatches
      hide-canvas
    ></v-color-picker>
  </div>
</template>

<script>
export default {
  name: "ColorForm",
  props: {
    color_form_data: {
      type: String,
      required: false,
    }
  },
  methods: {
    updateColorForm(value) {
      this.$emit("update-color-form-data", value.hex);
    }
  },
  data: () => ({
    swatches: [
      ["#FF0000", "#AA0000", "#550000"],
      ["#FFFF00", "#AAAA00", "#555500"],
      ["#00FF00", "#00AA00", "#005500"],
      ["#00FFFF", "#00AAAA", "#005555"],
      ["#0000FF", "#0000AA", "#000055"]
    ]
  })
};
</script>
