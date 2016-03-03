window.Spaceport = {}

Vue.config.debug = true

/*
 * Load the Spaceport components.
 */
require('./core/components');


/**
 * Load the Spaceport application
 */
window.SpaceportApp = Vue.extend()

/**
 * Load the Spaceport routes
 */
require('./core/routes.js')

/**
 * Start the Spaceport application
 */
SpaceportRouter.start(SpaceportApp, '#spaceport-app')
