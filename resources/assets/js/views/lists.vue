<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <a v-link="{ name: 'list.index' }">Go to Lists</a>

        <router-view></router-view>

      </div>
    </div>
  </div>
</template>

<script>
module.exports = {
    ready: function () {
        //
    },
}
</script>
