<template>
    <router-view></router-view>
</template>

<script>
module.exports = {

    mixins: [SpaceportHeaderMixin],

    ready: function () {
        this.setBreadcrumb('Settings')
        this.setHeaderTitle('Settings')
    },
}
</script>
