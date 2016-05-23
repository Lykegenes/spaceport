<template>
    <router-view></router-view>
</template>

<script>
import SpaceportHeaderMixin from 'mixins/SpaceportHeaderMixin.js'

export default {

    mixins: [SpaceportHeaderMixin],

    ready() {
        this.setBreadcrumb('Settings')
        this.setHeaderTitle('Settings')
    },
}
</script>
