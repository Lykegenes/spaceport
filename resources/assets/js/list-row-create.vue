<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        Here's your list : <br>
        <div v-for="column in columns">
            <template v-if="isValidColumnType(column.type)">
                <text-field v-if="column.type == ColumnTypes.COL_TEXT_FIELD"
                            :display="column.title"
                            :form="forms.createListRow"
                            :name="column.title"
                            :input.sync="column.title">
                </text-field>
            </template>
            <div v-else>
                Column not supported.
            </div>
        </div>
    </div>
</div>
{{ columns | json }}
</template>

<script>
module.exports = {

    mixins: [Spaceport.ColumnTypesMixin],

    ready: function () {
        this.getListColumns(this.$route.params.listId)
    },

    data: function () {
        return {
            columns: [],
            forms: {
                createListRow: new SpaceportForm(),
            },
        }
    },

    watch: {
        'columns': function(columns) {
            for (let column of columns) {
                //_.extend(this.forms.createListRow.fields, {name: 'test', value: 'test'})
                var test = column.title
                this.forms.createListRow.fields[(column.title)] = 'value'
                //this.forms.createListRow.fields[test] = 'value'
            }
            this.$log()
        }
    },

    methods: {
        getListColumns: function (id) {
            var self = this;

            this.$http.get('/api/lists/' + id + '/columns')
                .then(function (response) {
                    self.columns = response.data;
                    self.$log()
                });
        },
    },

};
</script>
