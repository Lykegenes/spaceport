
/**
 * Load all of the core Spaceport Vue components.
 */
import ListIndex from './../lists/index.vue'
Vue.component('spaceport-list-index', ListIndex)

import ListCreateForm from './../lists/create.vue'
Vue.component('spaceport-list-create-form', ListCreateForm)

require('./../forms/bootstrap.js')
