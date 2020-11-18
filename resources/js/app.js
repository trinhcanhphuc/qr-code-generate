import Vuetify from "vuetify";
import { router } from "./routes";
import * as VeeValidate from "vee-validate";
import App from './App';

window.Vue = require("vue");
Vue.use(Vuetify);
window.axios = require('axios');
Vue.use(VeeValidate);

const app = new Vue({
  el: "#app",
  router,
  render: h => h(App),
  vuetify: new Vuetify({
    icons: {
      iconfont: "fa" // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    }
  })
});
