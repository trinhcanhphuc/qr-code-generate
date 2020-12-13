<template>
  <v-card class="py-3">
    <div
      v-for="(qr_result, i) in qr_results"
      :key="i"
    >
      <v-card class="m-3">
        <v-row>
          <v-col md="3" sm="2">
            <v-img
              :lazy-src="'/qr_images/' + qr_result.name + '.' + qr_result.type"
              max-height="100"
              max-width="100"
              :src="'/qr_images/' + qr_result.name + '.' + qr_result.type"
              class="m-auto"
            ></v-img>
          </v-col>
          <v-col md="7" sm="9">
          <v-chip>{{ qr_result.type }}</v-chip>
          <div>{{ qr_result.created_at }}</div>
          </v-col>
          <v-col md="2" sm="1" class="text-right">
            <v-menu
              bottom
              left
            >
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  icon
                  v-bind="attrs"
                  v-on="on"
                >
                  <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
              </template>

              <v-list>
                <v-list-item
                  v-for="(item, i) in options"
                  :key="i"
                >
                  <v-list-item-title>
                    {{ item.title }}
                  </v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
          </v-col>
        </v-row>
      </v-card>
    </div>
  </v-card>
</template>

<script>
export default {
  name: 'HistoryTab',
  props: {},
  data() {
    return {
      qr_results: [],
      options: [
        { title: 'Detail' },
        { title: 'Delete' }
      ]
    }
  },
  mounted: function() {
    axios.post('/user/history')
      .then(res => {
        this.qr_results = res.data.qr_results;
      }).catch(err => {
        console.log(err);
      }
    );
  }
}
</script>
