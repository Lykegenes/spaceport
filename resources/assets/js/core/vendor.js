/*
 * Load Vue & Vue-Resource.
 *
 * Vue is the JavaScript framework used by Spark.
 */
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

Vue.use(require('vue-resource'));

if (window.VueRouter === undefined) {
    window.VueRouter = require('vue-router');
}

/*
 * Load Underscore.js, used for map / reduce on arrays.
 */
if (window._ === undefined) {
    window._ = require('underscore');
}

/**
 * Load Bootstrap Javascript files
 */
require('bootstrap-sass/assets/javascripts/bootstrap');
