<template>
  <div class="v-application--wrap">
    <Header />
    <div class="container mt-16 mb-16 scroll-y">
      <slot />
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
  }
};
</script>
