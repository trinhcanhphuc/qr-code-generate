import Vuetify from "vuetify";
import { router } from "./routes";

window.Vue = require("vue");
Vue.use(Vuetify);
window.axios = require('axios');

const app = new Vue({
  el: "#app",
  router,
  vuetify: new Vuetify({
    icons: {
      iconfont: "fa" // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    }
  })
});
