<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">

    <spaceport-loading></spaceport-loading>

        <div v-for="(name, input) in form.fields">
            <form-field-builder
                        :type="listColumns.findByTitle(name).type"
                        :display="listColumns.findByTitle(name).title | capitalize"
                        :form="form"
                        :name="name"
                        :input.sync="input">
            </form-field-builder>
        </div>
    </div>
    <div class="panel-footer">
        <button v-on:click="validate" class="btn btn-primary">Validate</button>
    </div>
</div>
    Column.input : {{ listColumns | json }} <br>
    Form Object : {{ form | json }} <br>
    Post data : {{ postData | json }}<br>

</template>

<script>
import SpaceportForm from 'forms/SpaceportForm.js';
import SpaceportListItem from 'core/SpaceportListItem.js';
import SpaceportListColumns from 'core/SpaceportListColumns.js';

export default {

    ready () {
        this.getListColumns(this.$route.params.listId)
    },

    data () {
        return {
            listItem: new SpaceportListItem(),
            listColumns: new SpaceportListColumns(),
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods: {

        getListColumns (listId) {
            this.$http.get('/api/lists/' + listId + '/columns')
                .then(function (response) {
                    this.listColumns.set(response.json())
                    this.getListItem(this.$route.params.listId, this.$route.params.itemId)
                    this.form.initFormFieldsFromListColumnsDefaults(this.listColumns)
                });
        },

        getListItem (listId, itemId) {
            this.$http.get('/api/lists/' + listId + '/item/' + itemId)
                .then(function (response) {
                    this.listItem.set(response.json())
                    this.form.fillFormFieldsFromListItem(this.listColumns, this.listItem)
                });
        },

        // This should send the form to the server
        validate () {
            this.postData = this.form.fields
        },
    },
}
</script>
