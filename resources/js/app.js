require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueQrcodeReader from "vue-qrcode-reader";

Vue.use(VueRouter)
Vue.use(VueQrcodeReader);

const routes = [
    { path: '/', component: require('./components/Dashboard.vue').default },
    { path: '/tools', component: require('./components/Tools.vue').default },
    { path: '/employees', component: require('./components/Employees.vue').default },
    { path: '/borrowed', component: require('./components/Borrowed.vue').default },
    { path: '/lend', component: require('./components/Lend.vue').default },
    { path: '/*', component: require('./components/NotFound.vue').default },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    router
}).$mount('#app')