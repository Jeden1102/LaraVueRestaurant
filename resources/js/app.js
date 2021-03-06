require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
import Vuex from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'
import store from './store'
//Routes
import { routes } from './routes';
//carousel
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueAxios, axios)
//botstrap
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
//velidate
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)


// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

//Register Routes
export const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 */

Vue.component('app-header', require('./components/HeaderComponent.vue').default);
Vue.component('app-footer', require('./components/FooterComponent.vue').default);
Vue.component('app-cart', require('./components/siteCart.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    beforeCreate() { this.$store.commit('initialiseStore');},
}).$mount('#app')