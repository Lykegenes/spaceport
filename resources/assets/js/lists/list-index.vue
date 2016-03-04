<template>
<div class="panel panel-default">
    <div class="panel-heading">
        Listes
        <a v-link="{ name: 'list.create' }" class="btn btn-xs btn-success pull-right">Create a new list</a>
    </div>

    <div class="panel-body">
        <ul>
            <p v-if="lists.length == 0"> Aucune liste </p>
            <li v-for="list in lists">
                <a v-link="{ name: 'list.show', params: { listId: list.id } }"> {{ list.title }} </a>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
module.exports = {

    mixins: [SpaceportBreadcrumbs],

    ready: function () {
        this.setBreadcrumb('Lists')
        this.getLists();
    },

    data: function () {
        return {
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
                });
        },
    },

};
</script>
