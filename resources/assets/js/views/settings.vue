<template>
    <router-view></router-view>
</template>

<script>
module.exports = {

    mixins: [Spaceport.HeaderMixin],

    ready: function () {
        this.setBreadcrumb('Settings')
        this.setHeaderTitle('Settings')
    },
}
</script>
