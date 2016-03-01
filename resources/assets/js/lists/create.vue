<template>
    <div class="panel-heading">Listes</div>
    <form role="form">
        <div class="panel-body">
            <text-field :display="'Name'"
                        :form="forms.createList"
                        :name="'name'"
                        :input.sync="forms.createList.name">
            </text-field>
        </div>
        {{ forms.createList.name }} looks good!
        <div class="panel-footer">
            <button v-on:click="createList" class="btn btn-primary">Save</button>
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
                createList: new MyForm({
                    name: 'something'
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

            /*
            Spaceport.post('/api/lists/create/', this.forms.createList)
                .then(function () {
                    self.$dispatch('createList');
                });*/

            /*this.$http.get('/api/lists/').then(function (response) {
                console.log(response)
            })*/

            /*this.$http.post('/api/lists/create/', JSON.stringify(this.forms.createList)).then(function (response) {
                console.log(response)
            })*/

            Spaceport.post('/api/lists/create/', this.forms.createList).then(function (response) {
                    console.log('success!')
                    self.$log('forms.createList')
                }, function (errors) {
                    console.log('error!')
                    self.$log('forms.createList')
                })
        }
    },

};
</script>
