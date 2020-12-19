<template>
  <default-layout>
    <div class="row m-sm-3 mt-md-5">
      <div class="col-lg-12">
        <div class="profile-avatar w-100 text-center position-relative mb-3">
          <v-icon style='font-size: 200px'>
            fas fa-user-circle
          </v-icon>
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
        <v-tab-item>
          <v-card flat>
            <ProfileTab>
            </ProfileTab>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <HistoryTab>
            </HistoryTab>
          </v-card>
        </v-tab-item>
        </v-tabs-items>
      </div>
    </div>
  </default-layout>
</template>

<script>
import DefaultLayout from '../layouts/DefaultLayout.vue';
import ProfileTab from '../components/ProfileTab.vue';
import HistoryTab from '../components/HistoryTab.vue';

export default {
  name: "Profile",
  data () {
    return {
      tab: null,
      items: [
        { tab: 'profile' },
        { tab: 'history' }
      ]
    }
  },
  components: {
    DefaultLayout,
    ProfileTab,
    HistoryTab
  },
  mounted: function() {
    axios.post('/user/auth')
      .then(res => {
      }).catch(err => {
        console.log(err);
      }
    );
  }
};
</script>
