
import $ from "jquery";
import 'foundation-sites';

import Vue from 'vue';
import VeeValidate from 'vee-validate';


$(document).foundation();

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
