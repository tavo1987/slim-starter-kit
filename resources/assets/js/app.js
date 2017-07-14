/**
 * We'll load jQuery, uncomment if you need it's
 */
//import $ from "jquery";


/**
 * We'll load Foundation, uncomment if you need it's
 */
//import 'foundation-sites';

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
//$(document).foundation();
