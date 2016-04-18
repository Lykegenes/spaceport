<template>

    <table :class="tableClass">
        <thead>
            <tr>
              <th v-for="col in columns">{{{ col.name }}}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="line in rows | limitBy pageSize pageFirstRowIndex">
                <td v-for="r in line">{{{ r.value }}}</td>
            </tr>
        </tbody>
    </table>

    <div class="pull-left">
        <span>Showing {{{ pageFirstRowIndex }}} to {{{ pageLastRowIndex }}} of {{{ rows.length }}} rows.</span>
        <span>{{{ pageSize }}} records per page.</span>
    </div>

    <ul v-if="pageLinks" class="pagination pagination-sm no-margin pull-right">
        <li :class="{ disabled: pageIndex == 0 }"><a @click="pageIndex = 0">&laquo;</a></li>
        <li v-for="i in pageLinks" :class="{ active: pageIndex == i }"><a @click="pageIndex = i">{{ i + 1 }}</a></li>
        <li :class="{ disabled: pageIndex == lastPage }"><a @click="pageIndex = lastPage">&raquo;</a></li>
    </ul>

</template>

<script>
    module.exports = {

        mixins: [Spaceport.ColumnTypesMixin],

        props: {
            model: Array,
            pageSize: {
                type: Number,
                default: 2
            },
            pageIndex: {
                type: Number,
                default: 0
            },
            pageLinksNumber: {
                type: Number,
                default: 2
            },
            orderBy: {
                type: Number,
                default: 0
            },
            orderAsc: {
                type: Boolean,
                default: false
            },
            /*wrapLines: {
                type: Boolean,
                default: false
            },*/
            striped: {
                type: Boolean,
                default: true
            },
            bordered: {
                type: Boolean,
                default: true
            },
            hover: {
                type: Boolean,
                default: true
            },
            condensed: {
                type: Boolean,
                default: false
            },
        },

        data () {
            return {
                columns: [
                    {key: 'id', name: 'Id'},
                    {key: 'task', name: 'Task'},
                    {key: 'label', name: 'Label'},
                ],
                rows: [
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                ],
            }
        },

        ready () {
            //
        },

        computed: {
            tableClass: function () {
                return {
                    'table': true,
                    'table-striped': this.striped,
                    'table-bordered': this.bordered,
                    'table-hover': this.hover,
                    'table-condensed': this.condensed,
                };
            },
            pageFirstRowIndex: function () {
                return this.pageSize * this.pageIndex;
            },
            pageLastRowIndex: function () {
                return Math.min(this.pageFirstRowIndex + this.pageSize, this.rows.length);
            },
            lastPage: function () {
                if (this.pageSize == 0 || this.rows.length == 0) {
                    return 0;
                }
                return Math.floor((this.rows.length - 1) / this.pageSize);
            },
            pageLinks: function () {
                var start = Math.max(this.pageIndex - this.pageLinksNumber, 0)
                var end = Math.min(this.pageIndex + this.pageLinksNumber, this.lastPage)
                return _.range(start, end + 1, 1);
            },
        },

        methods: {
            sortFunc: function () {

            }
        }

    }
</script>
