<template>
<div class="panel panel-default">
    <div class="panel-heading">
        Users
        <a v-link="{ name: 'users.invite' }" class="btn btn-xs btn-success pull-right">Invite a new user</a>
    </div>

    <div class="panel-body">
        <ul>
            <p v-if="users.length == 0"> Aucun Utilisateur </p>
            <li v-for="user in users">
                <a v-link="{ name: 'users.index', params: { userId: user.id } }"> {{ user.name }} </a>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
export default {

    ready() {
        this.getUsers();
    },

    data() {
        return {
            users: [],
        }
    },

    methods: {
        /*
         * Get the users from the API.
         */
        getUsers() {
            this.$http.get('/api/users/')
                .then(function (response) {
                    this.users = response.data;
                });
        },
    },

};
</script>
