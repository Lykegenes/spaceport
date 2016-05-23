<template>
<div class="panel panel-default">
    <div class="panel-heading">Create a List</div>
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
            <a class="btn btn-danger" v-link="{ name: 'list.index' }">Cancel</a>
        </div>
    </form>
</div>
</template>

<script>
import SpaceportForm from 'forms/SpaceportForm.js';

export default {

    data() {
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
        createList() {
            var self = this;

            Spaceport.post('/api/lists/create/', this.forms.createList)
                .then(function (response) {
                    self.$router.go({name: 'list.index'});
                });
        }
    },

};
</script>
