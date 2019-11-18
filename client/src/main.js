import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import BootstrapVue from "bootstrap-vue";
import vueResource from 'vue-resource';
import VueSession from 'vue-session'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";

Vue.use(BootstrapVue);
Vue.use(vueResource);
Vue.use(VueSession)

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
