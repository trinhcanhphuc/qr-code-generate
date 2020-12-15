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
              :lazy-src="'/qr_images/' + qr_result.image_name + '.' + qr_result.image_extension"
              max-height="100"
              max-width="100"
              :src="'/qr_images/' + qr_result.image_name + '.' + qr_result.image_extension"
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
                <v-list-item-group>
                  <v-list-item
                    @click="showQrResult(qr_result)"
                  >
                    Detail
                  </v-list-item>
                </v-list-item-group>
                <v-list-item-group>
                  <v-list-item
                    @click="deleteQrResult(qr_result)"
                  >
                    Delete
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-menu>
          </v-col>
        </v-row>
      </v-card>
    </div>
    <v-snackbar
      v-model="snackbar.visibility"
      :timeout="snackbar.timeout"
      :color="snackbar.color"
    >
      {{ snackbar.text }}
      <template v-slot:action="{ attrs }">
        <v-btn
          color="blue"
          text
          v-bind="attrs"
          @click="snackbar.visibility = false"
        >
        </v-btn>
      </template>
    </v-snackbar>
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
      ],
      snackbar: {
        visibility: false,
        text: 'An error has occurred',
        timeout: 2000,
        color: 'red'
      }
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
  },
  methods: {
    showQrResult(qr_result) {

    },
    deleteQrResult(qr_result) {
      axios.delete('/user/qr-results/' + qr_result.id)
        .then(res => {
          this.snackbar.visibility = true;
          this.snackbar.text = 'QR ' + qr_result.id + ' has been deleted succesfully';
          this.snackbar.color = 'blue';
          this.qr_results.splice(this.qr_results.indexOf(qr_result), 1);
        }).catch(err => {
          this.snackbar.visibility = true;
          this.snackbar.text = 'An error has occurred';
          this.snackbar.color = 'red';
        }
      );
    },
  }
}
</script>
