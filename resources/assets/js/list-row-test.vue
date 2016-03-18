<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-test :type="300"
                            :display="findColumnByName(name).title | capitalize"
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
    },

    data: function () {
        return {
            columns: [],
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods : {

        getListColumns: function (id) {
            var self = this;

            this.$http.get('/api/lists/' + id + '/columns')
                .then(function (response) {
                    self.columns = response.data;
                    self.compileColumnsToFormFields()
                    self.$log()
                });
        },

        // This should send the form to the server
        validate: function() {
            this.postData = this.form.fields
        },

        // Get the column's display
        findColumnByName: function(name) {
            return _.find(this.columns, function(col) {
                return col.title === name
            })
        },

        compileColumnsToFormFields: function() {
            // copy each column name and its value in the form
            var self = this
            _.each(this.columns, function (col) {
                self.$set("form.fields['" + col.title + "']", col.title)
            })
        }
    },
}
</script>
