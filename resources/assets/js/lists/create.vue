<template>
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <spark-text :display="'Name'"
                        :form="forms.createList"
                        :name="'name'"
                        :input.sync="forms.createList.name">
            </spark-text>
        </div>
        {{ forms.createList.name }} looks good!
        <div class="panel-footer">
            <button v-on:click="createList" class="btn btn-primary">Edit</button>
        </div>
    </form>
</template>

<script>
export default {
    /*
     * Bootstrap the component. Load the initial data.
     */
    ready: function () {
        //
    },

    data: function () {
        return {
            forms: {
                createList: new SparkForm({
                    name: ''
                })
            }
        }
    },

    methods: {
        /*
         * Edit a given list.
         */
        createList: function () {
            var self = this;
            alert('List created!')
            /*
            Spark.put('/lists/create/', this.forms.createList)
                .then(function () {
                    self.$dispatch('createList');
                });
                */
        }
    },

};
</script>
