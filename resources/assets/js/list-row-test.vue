<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-builder
                        :type="findColumnByName(name).type"
                        :display="findColumnByName(name).title | capitalize"
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
    Column.input : {{ columns | json }} <br>
    Form Object : {{ form | json }} <br>
    Post data : {{ postData | json }}
</template>

<script>
module.exports = {

    ready () {
        this.getListColumns(this.$route.params.listId)
    },

    data () {
        return {
            columns: [],
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods : {

        getListColumns (id) {
            var self = this;

            this.$http.get('/api/lists/' + id + '/columns')
                .then(function (response) {
                    self.columns = response.data;
                    self.compileColumnsToFormFields()
                    self.$log()
                });
        },

        // This should send the form to the server
        validate() {
            this.postData = this.form.fields
        },

        // Get the column's display
        findColumnByName (name) {
            return _.find(this.columns, function(col) {
                return col.title === name
            })
        },

        compileColumnsToFormFields () {
            // copy each column name and its value in the form
            var self = this
            _.each(this.columns, function (col) {
                self.$set("form.fields['" + col.title + "']", col.title)
            })
        }
    },
}
</script>
