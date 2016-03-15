<template>
    <div class="panel panel-default">
        <div class="panel-heading">Actions</div>
        <div class="panel-body">
            <a v-link="{ name: 'list.edit', params: { listId: $route.params.listId } }" class="btn btn-warning">Edit</a>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Colonnes
            <a v-link="{ name: 'column.create', params: { listId: $route.params.listId } }" class="btn btn-xs btn-success pull-right">Create a new column</a>
        </div>

        <div class="panel-body">
            <ul>
                <p v-if="columns.length == 0"> Aucune colonne </p>
                <li v-for="column in columns">
                    <a v-link="{ name: 'column.edit', params: { listId: $route.params.listId, columnId: column.id } }"> {{ column.title }} - {{ column.type }} </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
module.exports = {

    ready: function () {
        this.getColumns();
    },

    data: function () {
        return {
            columns: [],
        }
    },

    methods: {
        getColumns: function () {
            this.$http.get('/api/lists/' + this.$route.params.listId + '/columns')
                .then(function (columns) {
                    this.columns = columns.data;
                });
        },
    },
}
</script>
