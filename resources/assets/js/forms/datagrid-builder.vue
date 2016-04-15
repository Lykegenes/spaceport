<template>
    {{{ pageSize }}}
    {{{ pageIndex }}}
    {{{ firstRowIndex }}}
    <table :class="tableClass">
        <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 100px">Task</th>
              <th style="width: 40px">Label</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="line in rows | limitBy pageSize firstRowindex">
                <td v-for="r in line">{{{ r.value }}}</td>
            </tr>
        </tbody>
    </table>

    <ul v-if="pagingItems" class="pagination pagination-sm no-margin pull-right">
        <li :class="{ disabled: pageIndex == 0 }"><a @click="pageIndex = 0">«</a></li>
        <li v-for="i in pagingItems" :class="{ active: pageIndex == i.val }"><a @click="pageIndex = i.val">{{ i.name }}</a></li>
        <li :class="{ disabled: pageIndex == lastPage }"><a @click="pageIndex = lastPage">»</a></li>
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
            orderBy: {
                type: Number,
                default: 0
            },
            orderAsc: {
                default: false
            },
            wrapLines: {
                default: false
            },
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
                rows: [
                    [ {key: "id", value: 1}, {key: "task", value: "Update software"}, {key: "label", value: 55} ],
                    [ {key: "id", value: 2}, {key: "task", value: "Clean Database"}, {key: "label", value: 70} ],
                    [ {key: "id", value: 3}, {key: "task", value: "Cron job running"}, {key: "label", value: 30} ],
                    [ {key: "id", value: 4}, {key: "task", value: "Fix and squish bugs"}, {key: "label", value: 90} ],
                ],
            }
        },

        ready () {
            this.model = this.rows;
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
            firstRowIndex: function () {
                return this.pageSize * this.pageIndex;
            },
            lastPage: function () {
                if (!this.pageSize) {
                    return 0;
                }
                if (!this.model.length) {
                    return 0;
                }
                return Math.floor((this.model.length - 1) / this.pageSize);
            },
            pagingItems: function () {
                if (!this.pageSize) {
                    return null;
                }
                if (!this.model.length) {
                    return null;
                }
                var borders = 2;
                var min = Math.max(this.pageIndex - borders, 0);
                var max = Math.min(min + 2 * borders, this.lastPage);
                min = Math.max(max - 2 * borders, 0);
                if (min == max) {
                    return null;
                }
                var result = [];
                for (var i = min; i <= max; ++i)
                    result.push({
                        name: i + 1,
                        val: i
                    });
                return result;
            }
        },

    }
</script>
