<template>

    <datagrid-builder></datagrid-builder>

</template>

<script>
import TestHeaderMixin from 'mixins/SpaceportHeaderMixin.js'

export default {

    mixins: [TestHeaderMixin],

    ready() {
        this.setBreadcrumb('Datagrid')
        this.setHeaderTitle('This is a Datagrid')
    },
}
</script>
