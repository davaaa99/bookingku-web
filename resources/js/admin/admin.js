/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('verify-component', require('./components/VerifyComponent.vue').default);
Vue.component('verify-detail', require('./components/VerifyDetailComponent.vue').default);
Vue.component('client-list', require('./components/clientListComponent.vue').default);
Vue.component('detail-lokasi', require('./components/detailLokasiComponent.vue').default);
Vue.component('detail-lapangan', require('./components/detailLapanganComponent.vue').default);
Vue.component('payment-list', require('./components/paymentComponent.vue').default);
Vue.component('payment-detail', require('./components/paymentDetailComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});