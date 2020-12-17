<template>
  <div class="v-application--wrap">
    <Header />
    <div class="container mt-16 mb-16 scroll-y">
      <slot />
      <v-btn
        v-scroll="onScroll"
        v-show="go_top.fab"
        fab
        dark
        fixed
        bottom
        right
        color="primary"
        @click="goTop"
      >
        <v-icon>mdi-arrow-up</v-icon>
      </v-btn>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from "./Header";
import Footer from "./Footer";

export default {
  name: "DefaultLayout",
  components: {
    Header,
    Footer
  },
  data() {
    return {
      go_top: {
        fab: false
      }
    }
  },
  methods: {
    onScroll(e) {
      if (typeof window === 'undefined') return
      const top = window.pageYOffset || e.target.scrollTop || 0
      this.go_top.fab = top > 20
    },
    goTop() {
      this.$vuetify.goTo(0)
    }
  }
}
</script>
