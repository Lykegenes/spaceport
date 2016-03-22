window.Spaceport = {}

Vue.config.devtools = true
Vue.config.debug = true

/*
 * Load the Spaceport components.
 */
require('./core/components');


/**
 * Load the Spaceport application
 */
window.SpaceportApp = Vue.extend({

    data: function () {
        return {
            SpaceportHeader: Spaceport.HeaderData,
        }
    },

})


/**
 * Load the Spaceport routes
 */
require('./core/routes.js')


/**
 * Start the Spaceport application
 */
SpaceportRouter.start(SpaceportApp, '#spaceport-app')
