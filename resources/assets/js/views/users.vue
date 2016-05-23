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
import TestHeaderMixin from 'mixins/SpaceportHeaderMixin.js'

export default {

    mixins: [TestHeaderMixin],

    ready() {
        this.setBreadcrumb('Users')
        this.setHeaderTitle('Manage your Users')
    },
}
</script>
