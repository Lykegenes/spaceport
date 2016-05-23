<template>
<div class="panel panel-default">
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Title'"
                        :form="forms.editList"
                        :name="'title'"
                        :input.sync="forms.editList.title">
            </text-field>
        </div>
        <div class="panel-footer">
            <button v-on:click="updateList" class="btn btn-primary">Save</button>
            <a class="btn btn-danger" v-link="{ name: 'list.show', params: { listId: $route.params.listId } }">Cancel</a>
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
import SpaceportForm from 'forms/SpaceportForm.js';

export default {

    ready() {
        this.getList(this.$route.params.listId)
    },

    data() {
        return {
            list: null,
            forms: {
                editList: new SpaceportForm({
                    title: ''
                })
            }
        }
    },

    watch: {
        list(list) {
            this.forms.editList.title = list.title
        }
    },

    methods: {
        getList(id) {
            var self = this;

            this.$http.get('/api/lists/' + id)
                .then(function (response) {
                    self.list = response.data;
                });
        },

        updateList() {
            var self = this;

            Spaceport.put('/api/lists/' + this.list.id, this.forms.editList)
                .then(function () {
                    self.$router.go({name: 'list.index'});
                });
        },

        deleteList() {
            var self = this;

            Spaceport.delete('/api/lists/' + this.list.id, this.forms.editList)
                .then(function () {
                    self.$router.go({name: 'list.index'});
                });
        },
    },

};
</script>
