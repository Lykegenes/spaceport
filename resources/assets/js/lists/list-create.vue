<template>
<div class="panel panel-default">
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Title'"
                        :form="forms.createList"
                        :name="'title'"
                        :input.sync="forms.createList.title">
            </text-field>
        </div>
        <div class="panel-footer">
            <button v-on:click="createList" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
</template>

<script>
module.exports = {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function () {
        //
    },

    data: function () {
        return {
            forms: {
                createList: new SpaceportForm({
                    title: ''
                })
            }
        }
    },

    methods: {
        /*
         * Edit a given list.
         */
        createList: function () {
            var self = this;

            Spaceport.post('/api/lists/create/', this.forms.createList)
                .then(function (response) {
                    self.$router.go({name: 'list.index'});
                });
        }
    },

};
</script>
