<template>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Create a column</h3>
    </div>
    <form role="form" class="form-horizontal" @keydown.enter.stop.prevent="">
        <div class="box-body">
            <text-field :display="'Title'"
                        :form="forms.createColumn"
                        :name="'title'"
                        :input.sync="forms.createColumn.title">
            </text-field>

            <select-field :display="'Type'"
                        :form="forms.createColumn"
                        :name="'type'"
                        :items="columnTypes"
                        :input.sync="forms.createColumn.type">
            </select-field>
        </div>
        <div class="box-footer">
            <button v-on:click="createColumn" class="btn btn-primary">Save</button>
            <a class="btn btn-danger" v-link="{ name: 'list.show', params: { listId: $route.params.listId } }">Cancel</a>
        </div>
    </form>
</div>
</template>

<script>
import SpaceportForm from 'forms/SpaceportForm.js';
import SpaceportHttpModule from 'forms/SpaceportHttpModule.js';

export default {

    ready() {
        this.getColumnTypes();
    },

    data() {
        return {
            columnTypes: [],
            forms: {
                createColumn: new SpaceportForm({
                    title: '',
                    type: '',
                }),
            },
        }
    },

    methods: {

        createColumn() {
            var self = this;

            SpaceportHttpModule.post('/api/lists/' + this.$route.params.listId + '/columns/create', this.forms.createColumn)
                .then(function (response) {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },

        getColumnTypes() {
            var self = this;

            this.$http.get('/api/columns/types/')
                .then(function (response) {
                    self.columnTypes = response.json();
                });
        },
    },

};
</script>
