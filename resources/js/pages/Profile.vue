<template>
  <default-layout>
    <div class="row">
      <div class="col-12 mt-5">
        <h1 class="text-center">User Profile</h1>
      </div>
    </div>
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';

export default {
  name: "Profile",
  components: {
    DefaultLayout
  },
  mounted: function() {
    axios.post('/profile')
      .then(res => {
      }).catch(err => {
        console.log(err);
      }
    );
  }
};
</script>
