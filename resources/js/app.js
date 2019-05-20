require('./bootstrap');

import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Vue = require('vue');
window.Toast = Toast;
window.Swal = Swal;
window.Form = Form;
window.Fire = new Vue();

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('crud', require('./components/crud.vue').default);

const app = new Vue({
    el: '#app'
});
