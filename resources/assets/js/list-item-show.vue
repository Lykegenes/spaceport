<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-test :type="findColumnByTitle(columns, name).type"
                            :display="findColumnByTitle(columns, name).title | capitalize"
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
    Column.input : {{ columns | json }} <br>
    Form Object : {{ form | json }} <br>
    Post data : {{ postData | json }}
</template>

<script>
module.exports = {

    ready: function () {
        this.getListColumns(this.$route.params.listId)
        this.getListItem(this.$route.params.listId, this.$route.params.itemId)
    },

    data: function () {
        return {
            item: [],
            columns: [],
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods : {

        getListColumns: function (listId) {
            var self = this;

            this.$http.get('/api/lists/' + listId + '/columns')
                .then(function (response) {
                    self.columns = response.data
                    self.initFormFieldsFromColumns('form', self.columns)
                });
        },

        getListItem: function (listId, itemId) {
            var self = this;

            this.$http.get('/api/lists/' + listId + '/item/' + itemId)
                .then(function (response) {
                    self.item = response.data
                    self.fillFormFieldsFromItem('form', self.columns, self.item)
                });
        },

        // This should send the form to the server
        validate: function() {
            this.postData = this.form.fields
        },

        // Get the column's display
        findColumnByTitle: function(columns, title) {
            return _.find(columns, function(col) {
                return col.title === title
            })
        },

        initFormFieldsFromColumns: function(formKeyPath, columns) {
            // copy each column name in the form, and set it to an empty value
            var self = this
            _.each(columns, function (col) {
                self.$set(formKeyPath + ".fields['" + col.title + "']", '')
            })
        },

        fillFormFieldsFromItem: function(formKeyPath, columns, item) {
            // set every form field to this item's matching attribute, if it exists
            var self = this
            _.each(columns, function (col) {
                self.$set(formKeyPath + ".fields['" + col.title + "']", self.getItemAttribute(item, col.title))
            })
        },

        getItemAttribute: function(item, key) {
            // return the attribute if it exists
            if (_.indexOf(_.keys(item), key) > -1) {
                return item[key]
            }
            return ''
        }
    },
}
</script>
