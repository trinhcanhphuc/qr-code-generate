<template>
  <default-layout>
    <div class="row m-sm-3">
      <div class="col-lg-12">
        <v-tabs
          v-model="tab"
          align-with-title
          show-arrows
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
            <ProfileTab
              :profile_form_data="profile_form_data"
            >
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
      ],
      profile_form_data: {},
      snackbar: {
        visibility: false,
        text: 'An error has occurred',
        timeout: 2000,
        color: 'red'
      }
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
        this.profile_form_data = res.data
      }).catch(err => {
        console.log(err);
      }
    );
  }
};
</script>
