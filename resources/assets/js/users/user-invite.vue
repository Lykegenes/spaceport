<template>
<div class="panel panel-default">
    <div class="panel-heading">Invite a user</div>
    <form role="form" class="form-horizontal">
        <div class="panel-body">
            <text-field :display="'Name'"
                        :form="forms.inviteUser"
                        :name="'name'"
                        :input.sync="forms.inviteUser.name">
            </text-field>

            <text-field :display="'Email'"
                        :form="forms.inviteUser"
                        :name="'email'"
                        :input.sync="forms.inviteUser.email">
            </text-field>
        </div>
        <div class="panel-footer">
            <button v-on:click="inviteUser" class="btn btn-primary">Invite</button>
            <a class="btn btn-danger" v-link="{ name: 'users.index' }">Cancel</a>
        </div>
    </form>
</div>
</template>

<script>
export default {

    data() {
        return {
            forms: {
                inviteUser: new SpaceportForm({
                    name: '',
                    email: '',
                })
            }
        }
    },

    methods: {
        /*
         * Edit a given list.
         */
        inviteUser() {
            var self = this;

            Spaceport.post('/api/users/invite/', this.forms.inviteUser)
                .then(function (response) {
                    self.$router.go({name: 'users.index'});
                });
        }
    },

};
</script>
