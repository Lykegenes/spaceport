(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

/**
 * Load all of the core Spaceport Vue components.
 */
require('./../lists/create');

},{"./../lists/create":2}],2:[function(require,module,exports){
'use strict';

Vue.component('spaceport-lists-create', {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function ready() {
        //
    },

    template: '<div class="panel-heading">Listes</div>\
        <form role="form" action="#" method="post">\
            <div class="panel-body">\
                <input type="text" class="form-control">\
            </div>\
            <div class="panel-footer">\
                <button type="submit" class="btn btn-primary">Edit</button>\
            </div>\
        </form>'
});

},{}],3:[function(require,module,exports){
'use strict';

/*
 * Load the Spark components.
 */
require('./core/components');

new Vue({
    el: '#spaceport-app',

    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function ready() {
        this.getLists();
    },

    data: {
        message: 'Hello Vue.js!',
        lists: []
    },

    methods: {
        /*
         * Get the lists from the API.
         */
        getLists: function getLists() {
            this.$http.get('/api/lists/').then(function (lists) {
                this.lists = lists.data;

                this.$broadcast('listsRetrieved', lists);
            });
        }
    }

});

},{"./core/components":1}]},{},[3]);

//# sourceMappingURL=spaceport.js.map
