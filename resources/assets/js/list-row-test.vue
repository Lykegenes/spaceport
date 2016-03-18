<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-test :type="300"
                            :display="getColumnDisplay(name) | capitalize"
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
        var self = this

        // copy each column name and its value in the form
        _.each(this.columns, function (col) {
            self.$set("form.fields['" + col.name + "']", col.input)
        })
    },

    data: function () {
        return {
            columns: [
                {
                    display: 'Display Title 1',
                    name: 'title 1',
                    input: 'input 1',
                },
                {
                    display: 'Display Title 2',
                    name: 'title 2',
                    input: 'input 2',
                },
            ],
            /*form: {
                errors: [],
                busy:false,
                fields:{}
            },*/
            form: new SpaceportForm(),
            postData: null,
        }
    },

    methods : {

        // This should send the form to the server
        validate: function() {
            this.postData = this.form.fields
        },

        // Get the column's display
        getColumnDisplay: function(name) {
            var col = _.find(this.columns, function(col) {
                return col.name === name
            })

            return col.display
        }
    },
}
</script>
