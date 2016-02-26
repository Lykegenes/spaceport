<template>
    <div class="panel-heading">
        Listes {{ message }}
        <a href="{{ action('ListController@create') }}" class="btn btn-xs btn-success pull-right">Create a new list</a>
    </div>

    <div class="panel-body">
        <ul>
            <p v-if="lists.length == 0"> Aucune liste </p>
            <li v-for="list in lists">
                <a href="#"> {{ list }} </a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function () {
        this.getLists();
    },

    data: function () {
        return {
            message: 'Hello Vue.js!',
            lists: [],
        }
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
        },
    },

};
</script>
