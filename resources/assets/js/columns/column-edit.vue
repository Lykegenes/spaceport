<template>
<div class="panel panel-default">
    <div class="panel-heading">Column</div>
    <form role="form" class="form-horizontal">
        <div class="panel-body">
            <text-field :display="'Title'"
                        :form="forms.editColumn"
                        :name="'title'"
                        :input.sync="forms.editColumn.title">
            </text-field>

            <select-field :display="'Type'"
                        :form="forms.editColumn"
                        :name="'type'"
                        :items="columnTypes"
                        :input.sync="forms.editColumn.type">
            </select-field>
        </div>
        <div class="panel-footer">
            <button v-on:click="updateColumn" class="btn btn-primary">Save</button>
            <a class="btn btn-danger" v-link="{ name: 'list.show', params: { listId: $route.params.listId } }">Cancel</a>
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
import SpaceportColumnTypesMixin from 'mixins/SpaceportColumnTypesMixin.js';
import SpaceportForm from 'forms/SpaceportForm.js';
import SpaceportHttpModule from 'forms/SpaceportHttpModule.js';

export default {

    mixins: [SpaceportColumnTypesMixin],

    ready() {
        this.getColumn(this.$route.params.columnId)
        this.getColumnTypes()
    },

    data() {
        return {
            column: {
                type: null
            },
            columnTypes: [],
            forms: {
                editColumn: new SpaceportForm({
                    title: '',
                    type: '',
                }),
            },
        }
    },

    watch: {
        column(column) {
            this.forms.editColumn.title = column.title
            this.forms.editColumn.type = column.type
        }
    },

    methods: {
        getColumn(id) {
            var self = this;

            this.$http.get('/api/columns/' + id)
                .then(function (response) {
                    self.column = response.data;
                });
        },

        getColumnTypes() {
            var self = this;

            this.$http.get('/api/columns/types/')
                .then(function (response) {
                    self.columnTypes = response.data;
                });
        },

        updateColumn() {
            var self = this;

            SpaceportHttpModule.put('/api/columns/' + this.$route.params.columnId, this.forms.editColumn)
                .then(function (response) {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },

        deleteColumn() {
            var self = this;

            SpaceportHttpModule.delete('/api/columns/' + this.column.id, this.forms.editColumn)
                .then(function () {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },
    },

};
</script>
