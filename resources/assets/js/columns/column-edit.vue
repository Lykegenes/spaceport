<template>
<div class="panel panel-default">
    <div class="panel-heading">Column</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Title'"
                        :form="forms.editColumn"
                        :name="'title'"
                        :input.sync="forms.editColumn.title">
            </text-field>
        </div>
        <div class="panel-footer">
            <button v-on:click="updateColumn" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Delete</div>
    <div class="panel-body">
        <button v-on:click="deleteColumn" class="btn btn-danger">Delete</button>
    </div>
</div>
</template>

<script>
module.exports = {

    ready: function () {
        this.getColumn(this.$route.params.columnId)
    },

    data: function () {
        return {
            column: null,
            forms: {
                editColumn: new SpaceportForm({
                    title: ''
                }),
            },
        }
    },

    watch: {
        'column': function(column) {
            this.forms.editColumn.title = column.title
        }
    },

    methods: {
        getColumn: function (id) {
            var self = this;

            this.$http.get('/api/columns/' + id)
                .then(function (response) {
                    self.column = response.data;
                });
        },

        updateColumn: function () {
            var self = this;

            Spaceport.put('/api/columns/' + this.$route.params.columnId, this.forms.editColumn)
                .then(function (response) {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },

        deleteColumn: function () {
            var self = this;

            Spaceport.delete('/api/columns/' + this.column.id, this.forms.editColumn)
                .then(function () {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },
    },

};
</script>
