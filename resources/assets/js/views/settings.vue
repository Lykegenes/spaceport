<template>
    <router-view></router-view>
</template>

<script>
import TestHeaderMixin from 'mixins/SpaceportHeaderMixin.js'

export default {

    mixins: [TestHeaderMixin],

    ready() {
        this.setBreadcrumb('Settings')
        this.setHeaderTitle('Settings')
    },
}
</script>
