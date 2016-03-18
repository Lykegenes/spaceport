<template>
<div class="panel panel-default">
    <div class="panel-heading">View a list</div>
    <div class="panel-body">
        Here's your list : <br>
        <div v-for="column in columns">
            <template v-if="isValidColumnType(column.type)">
                <text-field v-if="column.type == ColumnTypes.COL_TEXT_FIELD"
                            :display="column.title"
                            :form="forms.showList"
                            :name="column.title"
                            :input.sync="column.title">
                </text-field>
                <text-area v-if="column.type == ColumnTypes.COL_TEXT_AREA"
                            :display="'Title'"
                            :form="forms.showList"
                            :name="'title'"
                            :input.sync="column.title">
                </text-area>
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
        //this.getColumn(2)
        this.getListColumns(this.$route.params.listId)
    },

    data: function () {
        return {
            columns: [],
            /*column: {
                type: null
            },*/
            forms: {
                showColumn: new SpaceportForm({
                    title: '',
                    type: '',
                }),

                showList: new SpaceportForm(),
            },
        }
    },

    watch: {
        /*'column': function(column) {
            this.forms.showColumn.title = column.title
            this.forms.showColumn.type = column.type
        }*/
    },

    methods: {
        getColumn: function (id) {
            var self = this;

            this.$http.get('/api/columns/' + id)
                .then(function (response) {
                    self.column = response.data;
                });
        },
        getListColumns: function (id) {
            var self = this;

            this.$http.get('/api/lists/' + id + '/columns')
                .then(function (response) {
                    self.columns = response.data;
                    self.forms.showList.fields.set(response.data)
                    self.$log()
                });
        },
    },

};
</script>
