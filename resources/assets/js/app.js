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
 * We'll load jQuery and the Foundation framework which provides support
 * for JavaScript based foundation features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = require('jquery');
    require('foundation-sites/dist/js/plugins/foundation.core.js');
    require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js');
} catch (e) {}


/**
 * Init foundation
 */

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

