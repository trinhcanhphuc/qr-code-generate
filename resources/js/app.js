import Vuetify from "vuetify";
import { router } from "./routes";
import * as VeeValidate from "vee-validate";
import './utils/common';

window.Vue = require("vue");
Vue.use(Vuetify);
window.axios = require('axios');
Vue.use(VeeValidate);

const app = new Vue({
  el: "#app",
  router,
  vuetify: new Vuetify({
    icons: {
      iconfont: "mdi"
    }
  })
})
