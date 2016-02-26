/*
 * Load Vue & Vue-Resource.
 *
 * Vue is the JavaScript framework used by Spark.
 */
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

Vue.use(require('vue-resource'));

// Vue.http.headers.common['X-CSRF-TOKEN'] = Spark.csrfToken;

/*
 * Load Moment.js, used for date formatting and presentation.
 */
if (window.moment === undefined) {
    window.moment = require('moment');
}

/*
 * Load jQuery and Bootstrap jQuery, used for front-end interaction.
 */
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}

require('bootstrap-sass/assets/javascripts/bootstrap');
