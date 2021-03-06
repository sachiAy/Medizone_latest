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
import axios from 'axios'

window.Event=new Vue;
window.token=localStorage.getItem('token');

window.axios=axios
window.axios.defaults.baseURL='http://localhost:8000'
window.axios.defaults.params={api_token:window.token}

Vue.use(BootstrapVue);
Vue.use(VueSession)

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
