/*
 * Load the Spark components.
 */
require('./core/components');

new Vue({
    el: '#spaceport-app',

    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function () {
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
        getLists: function () {
            this.$http.get('/api/lists/')
                .then(function (lists) {
                    this.lists = lists.data;

                    this.$broadcast('listsRetrieved', lists);
                });
        }
    }

});
