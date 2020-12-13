<template>
  <default-layout>
    <div class="row m-sm-3 mt-md-5">
      <div class="col-lg-12">
        <v-card elevation="8" class="p-4 rounded-lg">
          <div class="profile-cover position-relative">
            <v-img
              lazy-src="https://picsum.photos/id/11/10/6"
              max-height="200"
              src="https://picsum.photos/id/11/500/300"
              class="rounded-lg"
            ></v-img>
          </div>
          <div class="profile-avatar w-100 text-center position-relative" style="height: 30px">
            <v-avatar style="width: 120px; height: 120px; top: -100px; border: 3px solid white;">
              <img
                src="https://cdn.vuetifyjs.com/images/john.jpg"
                alt="Phuc Trinh"
              >
            </v-avatar>
          </div>
          <h2 class="text-center">Phuc Trinh</h2>
          <v-tabs
            v-model="tab"
            align-with-title
            show-arrows
            class="mt-10"
          >
            <v-tabs-slider color="primary"></v-tabs-slider>
            <v-tab
              v-for="item in items"
              :key="item.tab"
            >
              {{ item.tab }}
            </v-tab>
          </v-tabs>
          <v-tabs-items v-model="tab">
          <v-tab-item
            v-for="item in items"
            :key="item.tab"
          >
            <v-card flat>
              <v-card-text>{{ item.content }}</v-card-text>
            </v-card>
          </v-tab-item>
        </v-tabs-items>
        </v-card>
      </div>
    </div>
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';

export default {
  name: "Profile",
  data () {
    return {
      tab: null,
      items: [
        { tab: 'profile', content: 'Tab Profile Content' },
        { tab: 'history', content: 'Tab History Content' },
      ]
    }
  },
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
