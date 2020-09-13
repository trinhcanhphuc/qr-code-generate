
import Vuetify from "vuetify";
import { router } from './routes'

window.Vue = require("vue");
Vue.use(Vuetify);

const app = new Vue({
  el: "#app",
  router,
  vuetify: new Vuetify(),
});
