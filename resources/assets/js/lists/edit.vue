<template>
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <form-text :display="'Name'"
                        :form="forms.editList"
                        :name="'name'"
                        :input.sync="forms.editList.name">
            </form-text>
        </div>
        {{ forms.editList.name }} looks good! </br>
        {{ list }}
        <div class="panel-footer">
            <button v-on:click="saveList" class="btn btn-primary">Save</button>
        </div>
    </form>
</template>

<script>
module.exports = {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function () {
        this.getList(1)
    },

    data: function () {
        return {
            list: null,
            forms: {
                editList: new MyForm({
                    name: ''
                })
            }
        }
    },

    watch: {
        'list': function(list) {
            this.forms.editList.name = list
        }
    },

    events: {
        'updateList': function() {
            alert('updated!')
        },
    },

    methods: {
        getList: function (id) {
            this.$http.get('/api/lists/' + id)
                .then(function (list) {
                    this.list = list.data;

                    this.$broadcast('listRetrieved', list);
                });
        },

        /*
         * Edit a given list.
         */
        saveList: function () {
            var self = this;

            Spark.put('/api/lists/' + this.list.id, this.forms.editList)
                .then(function () {
                    self.$dispatch('updateList');
                });
        },
    },

};
</script>
