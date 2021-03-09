require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueQrcodeReader from "vue-qrcode-reader"
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'

Vue.use(VueRouter)
Vue.use(VueQrcodeReader)

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.Form = Form;
window.Swal = Swal;
window.Fire = new Vue();

const routes = [
    { path: '/', component: require('./components/Dashboard.vue').default },
    { path: '/tools', component: require('./components/Tools.vue').default },
    { path: '/employees', component: require('./components/Employees.vue').default },
    { path: '/borrowed', component: require('./components/Borrowed.vue').default },
    { path: '/lend', component: require('./components/Lend.vue').default },
    { path: '/*', component: require('./components/NotFound.vue').default },
]

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    router
}).$mount('#app')