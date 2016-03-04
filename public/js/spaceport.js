(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

module.exports = {

    ready: function ready() {
        //
    },

    data: function data() {
        return {
            columnTypes: [{ value: 'first', text: 'first' }, { value: 'second', text: 'second' }],
            forms: {
                createColumn: new SpaceportForm({
                    title: '',
                    type: ''
                })
            }
        };
    },

    methods: {

        createColumn: function createColumn() {
            var self = this;

            Spaceport.post('/api/lists/' + this.$route.params.listId + '/columns/create', this.forms.createColumn).then(function (response) {
                self.$router.go({ name: 'list.show', 'params': { listId: self.$route.params.listId } });
            });
        }
    }

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"box box-success\">\n    <div class=\"box-header with-border\">\n        <h3 class=\"box-title\">Create a column</h3>\n    </div>\n    <form role=\"form\" class=\"form-horizontal\">\n        <div class=\"box-body\">\n            <text-field :display=\"'Title'\" :form=\"forms.createColumn\" :name=\"'title'\" :input.sync=\"forms.createColumn.title\">\n            </text-field>\n\n            <select-field :display=\"'Type'\" :form=\"forms.createColumn\" :name=\"'type'\" :items=\"columnTypes\" :input.sync=\"forms.createColumn.type\">\n            </select-field>\n        </div>\n        <div class=\"box-footer\">\n            <button v-on:click=\"createColumn\" class=\"btn btn-primary\">Save</button>\n        </div>\n    </form>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\columns\\column-create.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],2:[function(require,module,exports){
'use strict';

module.exports = {

    ready: function ready() {
        this.getColumn(this.$route.params.columnId);
    },

    data: function data() {
        return {
            column: null,
            forms: {
                editColumn: new SpaceportForm({
                    title: ''
                })
            }
        };
    },

    watch: {
        'column': function column(_column) {
            this.forms.editColumn.title = _column.title;
        }
    },

    methods: {
        getColumn: function getColumn(id) {
            var self = this;

            this.$http.get('/api/columns/' + id).then(function (response) {
                self.column = response.data;
            });
        },

        updateColumn: function updateColumn() {
            var self = this;

            Spaceport.put('/api/columns/' + this.$route.params.columnId, this.forms.editColumn).then(function (response) {
                self.$router.go({ name: 'list.show', 'params': { listId: self.$route.params.listId } });
            });
        },

        deleteColumn: function deleteColumn() {
            var self = this;

            Spaceport.delete('/api/columns/' + this.column.id, this.forms.editColumn).then(function () {
                self.$router.go({ name: 'list.show', 'params': { listId: self.$route.params.listId } });
            });
        }
    }

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Column</div>\n    <form role=\"form\">\n        <div class=\"panel-body\">\n            <text-field :display=\"'Title'\" :form=\"forms.editColumn\" :name=\"'title'\" :input.sync=\"forms.editColumn.title\">\n            </text-field>\n        </div>\n        <div class=\"panel-footer\">\n            <button v-on:click=\"updateColumn\" class=\"btn btn-primary\">Save</button>\n        </div>\n    </form>\n</div>\n\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Delete</div>\n    <div class=\"panel-body\">\n        <button v-on:click=\"deleteColumn\" class=\"btn btn-danger\">Delete</button>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\columns\\column-edit.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],3:[function(require,module,exports){
'use strict';

// http://jsfiddle.net/22d08ed4/1/

window.breadcrumbsData = ['Main'];

window.SpaceportBreadcrumbs = {

    methods: {
        setBreadcrumb: function setBreadcrumb(text) {
            Vue.set(breadcrumbsData, this._breadcrumbIndex, text);
        }
    },

    route: {
        activate: function activate(transition) {
            this._breadcrumbIndex = breadcrumbsData.length;
            breadcrumbsData.length++;
            transition.next();
        },

        deactivate: function deactivate(transition) {
            breadcrumbsData.splice(this._breadcrumbIndex, 1);
            transition.next();
        }
    }
};

},{}],4:[function(require,module,exports){
'use strict';

require('./../forms/bootstrap.js');

require('./breadcrumbs.js');

/**
 * Load all of the core Spaceport Vue components.
 */

},{"./../forms/bootstrap.js":6,"./breadcrumbs.js":3}],5:[function(require,module,exports){
'use strict';

window.SpaceportRouter = new VueRouter({
    //hashbang: true,
    //history: true,
    linkActiveClass: "active",
    //mode: 'html5',
    //root: '/cms',
    saveScrollPosition: true,
    transitionOnLoad: true
});

SpaceportRouter.map({
    '/': {
        component: require('./../views/lists.vue')
    },
    '/lists': {
        component: require('./../views/lists.vue'),
        subRoutes: {
            '/': {
                name: 'list.index',
                component: require('./../lists/list-index.vue')
            },
            '/create': {
                name: 'list.create',
                component: require('./../lists/list-create.vue')
            },
            '/:listId/show': {
                name: 'list.show',
                component: require('./../lists/list-show.vue')
            },
            '/:listId/edit': {
                name: 'list.edit',
                component: require('./../lists/list-edit.vue')
            },
            '/:listId/columns': {
                name: 'list.columns',
                component: require('./../lists/list-edit.vue')
            },
            '/:listId/columns/create': {
                name: 'column.create',
                component: require('./../columns/column-create.vue')
            },
            '/:listId/columns/:columnId': {
                name: 'column.edit',
                component: require('./../columns/column-edit.vue')
            }
        }
    }
});

},{"./../columns/column-create.vue":1,"./../columns/column-edit.vue":2,"./../lists/list-create.vue":17,"./../lists/list-edit.vue":18,"./../lists/list-index.vue":19,"./../lists/list-show.vue":20,"./../views/lists.vue":22}],6:[function(require,module,exports){
'use strict';

require('./instance');

/**
 * Define the form error collection class.
 */
require('./errors');

_.extend(Spaceport, require('./http'));

require('./components');

},{"./components":7,"./errors":8,"./http":15,"./instance":16}],7:[function(require,module,exports){
'use strict';

Vue.component('text-field', require('./fields/text-field.vue'));
Vue.component('textarea-field', require('./fields/textarea-field.vue'));
Vue.component('password-field', require('./fields/password-field.vue'));
Vue.component('select-field', require('./fields/select-field.vue'));
Vue.component('radio-field', require('./fields/radio-field.vue'));
Vue.component('checkbox-field', require('./fields/checkbox-field.vue'));

},{"./fields/checkbox-field.vue":9,"./fields/password-field.vue":10,"./fields/radio-field.vue":11,"./fields/select-field.vue":12,"./fields/text-field.vue":13,"./fields/textarea-field.vue":14}],8:[function(require,module,exports){
'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

/**
 * Spark form error collection class.
 */
window.SpaceportFormErrors = function () {
    this.errors = {};

    /**
     * Determine if the collection has any errors.
     */
    this.hasErrors = function () {
        return !_.isEmpty(this.errors);
    };

    /**
     * Determine if the collection has errors for a given field.
     */
    this.has = function (field) {
        return _.indexOf(_.keys(this.errors), field) > -1;
    };

    /**
     * Get all of the raw errors for the collection.
     */
    this.all = function () {
        return this.errors;
    };

    /**
     * Get all of the errors for the collection in a flat array.
     */
    this.flatten = function () {
        return _.flatten(_.toArray(this.errors));
    };

    /**
     * Get the first error message for a given field.
     */
    this.get = function (field) {
        if (this.has(field)) {
            return this.errors[field][0];
        }
    };

    /**
     * Set the raw errors for the collection.
     */
    this.set = function (errors) {
        if ((typeof errors === 'undefined' ? 'undefined' : _typeof(errors)) === 'object') {
            this.errors = errors;
        } else {
            this.errors = { 'field': ['Something went wrong. Please try again.'] };
        }
    };

    /**
     * Forget all of the errors currently in the collection.
     */
    this.forget = function () {
        this.errors = {};
    };
};

},{}],9:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'items', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <div class=\"checkbox\" v-for=\"item in items\">\n            <label>\n                <input type=\"checkbox\" :name=\"item.name\" :value=\"item.value\" v-model=\"input\">\n                {{ item.text }}\n            </label>\n        </div>\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\checkbox-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],10:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <input type=\"password\" class=\"form-control\" v-model=\"input\">\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\password-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],11:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'items', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <div class=\"radio\" v-for=\"item in items\">\n            <label>\n                <input type=\"radio\" :name=\"item.name\" :value=\"item.value\" v-model=\"input\">\n                {{ item.text }}\n            </label>\n        </div>\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\radio-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],12:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'items', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <select class=\"form-control\" v-model=\"input\">\n            <option v-for=\"item in items\" :value=\"item.value\">\n                {{ item.text }}\n            </option>\n        </select>\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\select-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],13:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <input type=\"text\" class=\"form-control\" v-model=\"input\">\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\text-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],14:[function(require,module,exports){
'use strict';

module.exports = {

    props: ['display', 'form', 'name', 'input']

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"form-group\" :class=\"{'has-error': form.errors.has(name)}\">\n    <label class=\"col-sm-2 control-label\">{{ display }}</label>\n    <div class=\"col-sm-10\">\n        <textarea class=\"form-control\" rows=\"3\" v-model=\"input\"></textarea>\n\n        <span class=\"help-block\" v-show=\"form.errors.has(name)\">\n            <strong>{{ form.errors.get(name) }}</strong>\n        </span>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\forms\\fields\\textarea-field.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],15:[function(require,module,exports){
'use strict';

module.exports = {
    /**
     * A few helper methods for making HTTP requests and doing common form actions.
     */
    post: function post(uri, form) {
        return Spaceport.sendForm('post', uri, form);
    },

    put: function put(uri, form) {
        return Spaceport.sendForm('put', uri, form);
    },

    delete: function _delete(uri, form) {
        return Spaceport.sendForm('delete', uri, form);
    },

    sendForm: function sendForm(method, uri, form) {
        return new Promise(function (resolve, reject) {
            form.startProcessing();

            Vue.http[method](uri, JSON.stringify(form)).then(function (response) {
                form.finishProcessing();

                resolve(response);
            }, function (errors) {
                form.errors.set(errors.data);
                form.busy = false;

                reject(errors);
            });
        });
    }
};

},{}],16:[function(require,module,exports){
"use strict";

/**
 * SparkForm helper class. Used to set common properties on all forms.
 */
window.SpaceportForm = function (data) {
    var form = this;

    _.extend(this, data);

    this.errors = new SpaceportFormErrors();
    this.busy = false;
    this.successful = false;

    this.startProcessing = function () {
        form.errors.forget();
        form.busy = true;
        form.successful = false;
    };

    this.finishProcessing = function () {
        form.busy = false;
        form.successful = true;
    };
};

},{}],17:[function(require,module,exports){
'use strict';

module.exports = {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function ready() {
        //
    },

    data: function data() {
        return {
            forms: {
                createList: new SpaceportForm({
                    title: ''
                })
            }
        };
    },

    methods: {
        /*
         * Edit a given list.
         */
        createList: function createList() {
            var self = this;

            Spaceport.post('/api/lists/create/', this.forms.createList).then(function (response) {
                self.$router.go({ name: 'list.index' });
            });
        }
    }

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Listes</div>\n    <form role=\"form\">\n        <div class=\"panel-body\">\n            <text-field :display=\"'Title'\" :form=\"forms.createList\" :name=\"'title'\" :input.sync=\"forms.createList.title\">\n            </text-field>\n        </div>\n        <div class=\"panel-footer\">\n            <button v-on:click=\"createList\" class=\"btn btn-primary\">Save</button>\n        </div>\n    </form>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\lists\\list-create.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],18:[function(require,module,exports){
'use strict';

module.exports = {

    ready: function ready() {
        this.getList(this.$route.params.listId);
    },

    data: function data() {
        return {
            list: null,
            forms: {
                editList: new SpaceportForm({
                    title: ''
                })
            }
        };
    },

    watch: {
        'list': function list(_list) {
            this.forms.editList.title = _list.title;
        }
    },

    methods: {
        getList: function getList(id) {
            var self = this;

            this.$http.get('/api/lists/' + id).then(function (response) {
                self.list = response.data;
            });
        },

        updateList: function updateList() {
            var self = this;

            Spaceport.put('/api/lists/' + this.list.id, this.forms.editList).then(function () {
                self.$router.go({ name: 'list.index' });
            });
        },

        deleteList: function deleteList() {
            var self = this;

            Spaceport.delete('/api/lists/' + this.list.id, this.forms.editList).then(function () {
                self.$router.go({ name: 'list.index' });
            });
        }
    }

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Listes</div>\n    <form role=\"form\">\n        <div class=\"panel-body\">\n            <text-field :display=\"'Title'\" :form=\"forms.editList\" :name=\"'title'\" :input.sync=\"forms.editList.title\">\n            </text-field>\n        </div>\n        <div class=\"panel-footer\">\n            <button v-on:click=\"updateList\" class=\"btn btn-primary\">Save</button>\n        </div>\n    </form>\n</div>\n\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Delete</div>\n    <div class=\"panel-body\">\n        <button v-on:click=\"deleteList\" class=\"btn btn-danger\">Delete</button>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\lists\\list-edit.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],19:[function(require,module,exports){
'use strict';

module.exports = {

    mixins: [SpaceportBreadcrumbs],

    ready: function ready() {
        this.setBreadcrumb('Lists');
        this.getLists();
    },

    data: function data() {
        return {
            lists: []
        };
    },

    methods: {
        /*
         * Get the lists from the API.
         */
        getLists: function getLists() {
            this.$http.get('/api/lists/').then(function (lists) {
                this.lists = lists.data;
            });
        }
    }

};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">\n        Listes\n        <a v-link=\"{ name: 'list.create' }\" class=\"btn btn-xs btn-success pull-right\">Create a new list</a>\n    </div>\n\n    <div class=\"panel-body\">\n        <ul>\n            <p v-if=\"lists.length == 0\"> Aucune liste </p>\n            <li v-for=\"list in lists\">\n                <a v-link=\"{ name: 'list.show', params: { listId: list.id } }\"> {{ list.title }} </a>\n            </li>\n        </ul>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\lists\\list-index.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],20:[function(require,module,exports){
'use strict';

module.exports = {

    ready: function ready() {
        this.getColumns();
    },

    data: function data() {
        return {
            columns: []
        };
    },

    methods: {
        getColumns: function getColumns() {
            this.$http.get('/api/lists/' + this.$route.params.listId + '/columns').then(function (columns) {
                this.columns = columns.data;
            });
        }
    }
};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">Actions</div>\n    <div class=\"panel-body\">\n        <a v-link=\"{ name: 'list.edit', params: { listId: $route.params.listId } }\" class=\"btn btn-warning\">Edit</a>\n    </div>\n</div>\n\n<div class=\"panel panel-default\">\n    <div class=\"panel-heading\">\n        Colonnes\n        <a v-link=\"{ name: 'column.create', params: { listId: $route.params.listId } }\" class=\"btn btn-xs btn-success pull-right\">Create a new column</a>\n    </div>\n\n    <div class=\"panel-body\">\n        <ul>\n            <p v-if=\"columns.length == 0\"> Aucune colonne </p>\n            <li v-for=\"column in columns\">\n                <a v-link=\"{ name: 'column.edit', params: { listId: $route.params.listId, columnId: column.id } }\"> {{ column.title }} </a>\n            </li>\n        </ul>\n    </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\lists\\list-show.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}],21:[function(require,module,exports){
'use strict';

window.Spaceport = {};

Vue.config.debug = true;

/*
 * Load the Spaceport components.
 */
require('./core/components');

/**
 * Load the Spaceport application
 */
window.SpaceportApp = Vue.extend();

/**
 * Load the Spaceport routes
 */
require('./core/routes.js');

/**
 * Start the Spaceport application
 */
SpaceportRouter.start(SpaceportApp, '#spaceport-app');

},{"./core/components":4,"./core/routes.js":5}],22:[function(require,module,exports){
"use strict";

module.exports = {
    ready: function ready() {
        //
    },

    data: function data() {
        return {
            breadcrumbs: breadcrumbsData
        };
    }
};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "\n<div class=\"container\">\n  <div class=\"row\">\n    <div class=\"col-md-10 col-md-offset-1\">\n\n      Breadcrumbs: {{ breadcrumbs.join(' &gt; ') }}\n\n      <br>\n\n      <a v-link=\"{ name: 'list.index' }\">Go to Lists</a>\n\n      <router-view></router-view>\n\n    </div>\n  </div>\n</div>\n"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), true)
  if (!hotAPI.compatible) return
  var id = "C:\\Users\\psamson\\Documents\\GitHub\\spaceport\\resources\\assets\\js\\views\\lists.vue"
  if (!module.hot.data) {
    hotAPI.createRecord(id, module.exports)
  } else {
    hotAPI.update(id, module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
},{"vue":"vue","vue-hot-reload-api":"vue-hot-reload-api"}]},{},[21]);

//# sourceMappingURL=spaceport.js.map
