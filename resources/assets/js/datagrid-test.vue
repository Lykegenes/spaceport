<template>

    <datagrid-builder></datagrid-builder>

</template>

<script>
import SpaceportHeaderMixin from 'mixins/SpaceportHeaderMixin.js'

export default {

    mixins: [SpaceportHeaderMixin],

    ready() {
        this.setBreadcrumb('Datagrid')
        this.setHeaderTitle('This is a Datagrid')
    },
}
</script>
