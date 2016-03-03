window.Spaceport = {}

Vue.config.debug = true

/*
 * Load the Spark components.
 */
require('./core/components');


//new Vue(app).$mount('#spaceport-app')
/*new Vue({
    el: '#spaceport-app',
});*/


//-----------------------------------------------------
// Define some components
var Foo = Vue.extend({
    template: '<p>This is foo!</p>'
})

var Bar = Vue.extend({
    template: '<p>This is bar!</p>'
})

var App = Vue.extend({})

var VueRouter = require('vue-router')
var router = new VueRouter()

router.map({
    '/': {
        component: require('./views/lists.vue'),
    },
    '/lists': {
        component: require('./views/lists.vue'),
        subRoutes: {
            '/': {
                name: 'list.index',
                component: require('./lists/index.vue'),
            },
            '/create': {
                name: 'list.create',
                component: require('./lists/create.vue'),
            },
            '/:listId/show': {
                name: 'list.show',
                component: require('./lists/show.vue'),
            },
            '/:listId/edit': {
                name: 'list.edit',
                component: require('./lists/edit.vue'),
            },
            '/:listId/columns': {
                name: 'list.columns',
                component: require('./lists/edit.vue'),
            },
            '/:listId/columns/create': {
                name: 'column.create',
                component: require('./columns/create.vue'),
            },
        },
    },
    '/foo': {
        component: require('./lists/index.vue')
    },
    '/bar': {
        component: Bar
    }
})

router.start(App, '#spaceport-app')
