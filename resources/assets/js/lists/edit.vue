<template>
<div class="panel panel-default">
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Name'"
                        :form="forms.editList"
                        :name="'name'"
                        :input.sync="forms.editList.name">
            </text-field>
        </div>
        {{ forms.editList.name }} looks good! </br>
        {{ list }}
        <div class="panel-footer">
            <button v-on:click="updateList" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Delete</div>
    <div class="panel-body">
        <button v-on:click="deleteList" class="btn btn-danger">Delete</button>
    </div>
</div>
</template>

<script>
module.exports = {

    ready: function () {
        this.getList(this.$route.params.listId)
    },

    data: function () {
        return {
            list: null,
            forms: {
                editList: new SpaceportForm({
                    name: ''
                })
            }
        }
    },

    watch: {
        'list': function(list) {
            this.forms.editList.name = list.name
        }
    },

    methods: {
        getList: function (id) {
            var self = this;

            this.$http.get('/api/lists/' + id)
                .then(function (list) {
                    self.list = list.data;

                    self.$broadcast('listRetrieved', list);
                });
        },

        updateList: function () {
            var self = this;

            Spaceport.put('/api/lists/' + this.list.id, this.forms.editList)
                .then(function () {
                    self.$router.go({name: 'list.index'});
                });
        },

        deleteList: function () {
            var self = this;

            Spaceport.delete('/api/lists/' + this.list.id, this.forms.editList)
                .then(function () {
                    self.$router.go({name: 'list.index'});
                });
        },
    },

};
</script>
