/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

<<<<<<< HEAD
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);


=======
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);
>>>>>>> origin/newdava-dev
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('register-component', require('./components/registerComponent.vue').default);
Vue.component('login-component', require('./components/loginComponent.vue').default);
Vue.component('location-list', require('./components/locationListComponent.vue').default);
Vue.component('location-detail', require('./components/locationDetailComponent.vue').default);
Vue.component('location-add', require('./components/locationAddComponent.vue').default);
Vue.component('location-edit', require('./components/locationEditComponent.vue').default);


Vue.component('menu-lapangan', require('./components/menuLapanganComponent.vue').default);
Vue.component('add-lapangan', require('./components/addLapangComponent.vue').default);
Vue.component('edit-lapangan', require('./components/editLapangComponent.vue').default);
Vue.component('detail-lapangan', require('./components/detailLapangComponent.vue').default);

Vue.component('manage-schedule', require('./components/manageScheduleComponent.vue').default);
Vue.component('client-list', require('../admin/components/clientListComponent.vue').default);

Vue.component('booking-list', require('./components/bookingListComponent.vue').default);
Vue.component('add-booking', require('./components/addBookingComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
