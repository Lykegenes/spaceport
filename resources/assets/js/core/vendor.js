import Vue from 'vue';
window.Vue = Vue;

import VueResource from 'vue-resource';
window.Vue.use(VueResource);

import VueRouter from 'vue-router';
window.VueRouter = VueRouter;

import _ from 'underscore';
window._ = _;

/*
 * Load Vue, Vue-Resource and VueRouter.
 *
 * Vue is the JavaScript framework used by Spaceport.
 *
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

Vue.use(require('vue-resource'));

if (window.VueRouter === undefined) {
    window.VueRouter = require('vue-router');
}

/*
 * Load Underscore.js, used in many Spaceport classes and objects.
 *
if (window._ === undefined) {
    window._ = require('underscore');
}

/*
 * Load jQuery, used for various UI components, including Twitter Bootstrap.
 *
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}

/**
 * Load Bootstrap Javascript files
 *
require('bootstrap-sass');

/**
 * Load Bootstrap DatePicker files
 *
require('bootstrap-datepicker');
*/
