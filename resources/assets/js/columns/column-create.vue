<template>
<div class="panel panel-default">
    <div class="panel-heading">Column</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Title'"
                        :form="forms.createColumn"
                        :name="'title'"
                        :input.sync="forms.createColumn.title">
            </text-field>
        </div>
        <div class="panel-footer">
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
            forms: {
                createColumn: new SpaceportForm({
                    title: ''
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
