/*
 * Load Vue & Vue-Resource.
 *
 * Vue is the JavaScript framework used by Spark.
 */
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

Vue.use(require('vue-resource'));

/*
 * Load Underscore.js, used for map / reduce on arrays.
 */
if (window._ === undefined) {
    window._ = require('underscore');
}

require('bootstrap-sass/assets/javascripts/bootstrap');
