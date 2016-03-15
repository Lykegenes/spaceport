<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <a v-link="{ name: 'users.index' }">Go to Users</a>

        <router-view></router-view>

      </div>
    </div>
  </div>
</template>

<script>
module.exports = {

    mixins: [SpaceportHeaderMixin],

    ready: function () {
        this.setBreadcrumb('Users')
        this.setHeaderTitle('Manage your Users')
    },
}
</script>
