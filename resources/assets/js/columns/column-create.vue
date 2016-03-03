<template>
<div class="panel panel-default">
    <div class="panel-heading">Column</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Name'"
                        :form="forms.createColumn"
                        :name="'name'"
                        :input.sync="forms.createColumn.name">
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
                    name: ''
                })
            }
        }
    },

    methods: {

        createColumn: function () {
            var self = this;

            Spaceport.post('/api/columns/create/', this.forms.createColumn)
                .then(function (response) {
                    self.$router.go({name: 'list.index'});
                });
        }
    },

};
</script>
