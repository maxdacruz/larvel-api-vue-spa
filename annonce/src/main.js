import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import { Upload, Dialog } from 'element-ui';

Vue.component(Upload.name, Upload);
Vue.component(Dialog.name, Dialog);

Vue.config.productionTip = false;

store.dispatch("getUser");

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
