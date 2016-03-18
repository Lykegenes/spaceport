<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        <div v-for="(name, input) in form.fields">
            <form-field-test :display="column.display"
                            :name="name"
                            :input.sync="input">
            </form-field-test>
        </div>
    </div>
    <div class="panel-footer">
        <button v-on:click="validate" class="btn btn-primary">Validate</button>
    </div>
</div>
    Column.input : {{ column.input }} <br>
    Form Object : {{ form | json }}
</template>

<script>
module.exports = {

    ready: function () {
        this.$set('form.fields.' + this.column.name, this.column.input)
    },

    data: function () {
        return {
            column: {
                display: 'Display Title',
                name: 'title',
                input: 'input',
            },
            form: {
                errors: [],
                busy:false,
                fields:{}
            }
        }
    },

    methods : {
        validate: function() {
            console.log('validating')
            this.transformColumn(this.column)
        },

        transformColumn: function(column) {
            //var key = column.name;
            //this.form[key] = column.input;

            this.$set('form.fields.' + column.name, column.input)
        }
    },
}
</script>
