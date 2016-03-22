<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-test :type="listColumns.findByTitle(name).type"
                            :display="listColumns.findByTitle(name).title | capitalize"
                            :form="form"
                            :name="name"
                            :input.sync="input">
            </form-field-test>
        </div>
    </div>
    <div class="panel-footer">
        <button v-on:click="validate" class="btn btn-primary">Validate</button>
    </div>
</div>
    Column.input : {{ listColumns | json }} <br>
    Form Object : {{ form | json }} <br>
    Post data : {{ postData | json }}
</template>

<script>
module.exports = {

    ready: function () {
        this.getListColumns(this.$route.params.listId)
    },

    data: function () {
        return {
            listItem: new SpaceportListItem(),
            listColumns: new SpaceportListColumns(),
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods : {

        getListColumns: function (listId) {
            var self = this;

            this.$http.get('/api/lists/' + listId + '/columns')
                .then(function (response) {
                    self.listColumns.set(response.data)
                    this.getListItem(this.$route.params.listId, this.$route.params.itemId)
                    self.initFormFieldsFromColumns('form', self.listColumns)
                });
        },

        getListItem: function (listId, itemId) {
            var self = this;

            this.$http.get('/api/lists/' + listId + '/item/' + itemId)
                .then(function (response) {
                    self.listItem.set(response.data)
                    self.fillFormFieldsFromItem('form', self.listColumns, self.listItem)
                });
        },

        // This should send the form to the server
        validate: function() {
            this.postData = this.form.fields
        },

        initFormFieldsFromColumns: function(formKeyPath, listColumns) {
            // copy each column name in the form, and set it to an empty value
            var self = this
            _.each(listColumns.all(), function (col) {
                self.$set(formKeyPath + ".fields['" + col.title + "']", '')
            })
        },

        fillFormFieldsFromItem: function(formKeyPath, listColumns, listItem) {
            // set every form field to this item's matching attribute, if it exists
            var self = this
            _.each(listColumns.all(), function (col) {
                self.$set(formKeyPath + ".fields['" + col.title + "']", listItem.get(col.title))
            })
        },
    },
}
</script>
