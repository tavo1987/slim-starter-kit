/**
 * We'll load Foundation, uncomment if you need it's
 */

import Vue from 'vue';
import VeeValidate from 'vee-validate';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VeeValidate);
Vue.component('app-form', require('./components/Form.vue'));
const app = new Vue({
   el: '#app'
});

/**
 * Init foundation, uncomment if you need it's
 */

import 'foundation-sites/dist/js/foundation.js';
$(document).foundation();

/**
 * We'll load custom fonts with web font loader to improve page speed
 */

import WebFont from 'webfontloader';

WebFont.load({
    google: {
        families: ['Open Sans:300,400,700']
    }
});

