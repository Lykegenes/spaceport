
require('./../myforms/bootstrap.js')

/**
 * Load all of the core Spaceport Vue components.
 */
import ListIndex from './../lists/index.vue'
Vue.component('spaceport-list-index', ListIndex)

import ListCreateForm from './../lists/create.vue'
Vue.component('spaceport-list-create-form', ListCreateForm)

import ListEditForm from './../lists/edit.vue'
Vue.component('spaceport-list-edit-form', ListEditForm)

//require('./../forms/bootstrap.js')
