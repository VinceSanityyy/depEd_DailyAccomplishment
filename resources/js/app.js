

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import toastr from 'admin-lte/plugins/toastr/toastr.min.js'
import swal from 'admin-lte/plugins/sweetalert2/sweetalert2.min.js'

import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(VueRouter)
Vue.use(toastr)
Vue.use(Loading)
Vue.use(require('vue-moment'));

window.swal = swal;
window.toastr = require('toastr')

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    { path: '/accomplishmentPlan', component: require('./components/AccomplishmentPlan.vue').default },
    { path: '/accomplishmentReport', component: require('./components/accomplishmentReport.vue').default },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router,
});
