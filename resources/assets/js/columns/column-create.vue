<template>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Create a column</h3>
    </div>
    <form role="form" class="form-horizontal">
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
        </div>
    </form>
</div>
</template>

<script>
module.exports = {

    ready: function () {
        //
    },

    data: function () {
        return {
            columnTypes: [{value:'first', text:'first'}, {value:'second', text:'second'}],
            forms: {
                createColumn: new SpaceportForm({
                    title: '',
                    type: '',
                }),
            },
        }
    },

    methods: {

        createColumn: function () {
            var self = this;

            Spaceport.post('/api/lists/' + this.$route.params.listId + '/columns/create', this.forms.createColumn)
                .then(function (response) {
                    self.$router.go({name: 'list.show', 'params': { listId: self.$route.params.listId } });
                });
        },
    },

};
</script>
