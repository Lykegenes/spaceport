<template>
    <div class="box box-primary">

        <div v-show="loading" class="overlay">
            <spaceport-loading></spaceport-loading>
        </div>

        <div class="box-header with-border">
            <h3 class="box-title">{{ title }}</h3>
            <div class="box-tools">
                <div class="actions">
                    <div class="btn-group btn-group-sm">
                        <button @click='_refreshData()' type="button" class="btn btn-default"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
                <div class="search">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input class="form-control" placeholder="Search" type="text" v-model="searchQuery">
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body table-responsive no-padding">
            <table :class="tableClass">

                <thead>
                    <tr>
                      <th v-for="h in headers" :class="this._orderClass(h)" @click="this._clickOrderByTh(h)">{{ h.name }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="line in filteredRows
                                | orderBy orderByCol orderAscForFilter
                                | limitBy pageSize pageFirstRowIndex">

                        <td v-for="value in line">{{ value }}</td>

                    </tr>
                </tbody>

            </table>
        </div>

        <div class="box-footer clearfix">
            <div v-if="pageLinks" class="pull-left">
                <span>Showing {{ pageFirstRowIndex }} to {{ pageLastRowIndex }} of {{ filteredRows.length }} rows.</span>
                <span>{{ pageSize }} records per page.</span>
            </div>

            <ul v-if="pageLinks" class="pagination pagination-sm no-margin pull-right">
                <li :class="{ disabled: pageIndex == 0 }"><a @click="pageIndex = 0">&laquo;</a></li>
                <li v-for="i in pageLinks" :class="{ active: pageIndex == i }"><a @click="pageIndex = i">{{ i + 1 }}</a></li>
                <li :class="{ disabled: pageIndex == lastPage }"><a @click="pageIndex = lastPage">&raquo;</a></li>
            </ul>
        </div>
    </div>

</template>

<script>
    module.exports = {

        mixins: [Spaceport.ColumnTypesMixin],

        props: {
            columns: Array,
            listData: Array,
            title: String,
            pageSize: {
                type: Number,
                default: 10
            },
            pageIndex: {
                type: Number,
                default: 0
            },
            pageLinksNumber: {
                type: Number,
                default: 2
            },
            orderByCol: {
                type: String,
                default: 'id'
            },
            orderAsc: {
                type: Boolean,
                default: true
            },
            searchQuery: {
                type: String,
                default: null
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
                loading: false,
                datagridColumns: new SpaceportDatagridColumns(),
                headers: [
                    {key: 'id', name: 'Id'},
                    {key: 'task', name: 'Task'},
                    {key: 'label', name: 'Label'},
                ],
                searchableColumns: [
                    'id', 'task'
                ],
                rows: [
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                    { id: 1, task: "Update Software", label: 55 },
                    { id: 2, task: "Clean Database", label: 70 },
                    { id: 3, task: "Cron job running", label: 30 },
                    { id: 4, task: "Fix and squish bugs", label: 90 },
                ],
            }
        },

        ready () {
            this.datagridColumns.initColumnsFromViewColumns(this.headers)

            this.$log('datagridColumns')
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
                return Math.min(this.pageFirstRowIndex + this.pageSize, this.filteredRows.length);
            },
            lastPage: function () {
                if (this.pageSize == 0 || this.rows.length == 0) {
                    return 0;
                }
                return Math.floor((this.filteredRows.length - 1) / this.pageSize);
            },
            pageLinks: function () {
                var start = Math.max(this.pageIndex - this.pageLinksNumber, 0)
                var end = Math.min(this.pageIndex + this.pageLinksNumber, this.lastPage)
                return _.range(start, end + 1, 1);
            },
            orderAscForFilter: function () {
                return this.orderAsc ? 1 : -1
            },
            filteredRows: function () {
                var filter = Vue.filter('filterBy')
                return filter(this.rows, this.searchQuery, this.searchableColumns)
            },
        },

        methods: {
            _orderClass: function (th) {
                return {
                    'order': _.contains(this.searchableColumns, th.key),
                    'order-no': this.orderByCol != th.key,
                    'order-asc': this.orderByCol == th.key && this.orderAsc,
                    'order-desc': this.orderByCol == th.key && !this.orderAsc,
                };
            },
            _clickOrderByTh: function (th) {
                if (this.orderByCol == th.key) {
                    this.orderAsc = ! this.orderAsc
                } else if (_.contains(this.searchableColumns, th.key)) {
                    this.orderByCol = th.key
                    this.orderAsc = true
                }
            },
            _refreshData: function () {
                this.loading = true;

                var self = this
                _.delay(function () { self.loading = false }, 1000);
            },
        },

    }
</script>


<style scoped>
    table.table thead tr th.order {
        position: relative;
        padding-right: 20px;
        cursor: pointer;
    }
    table.table thead tr th.order-desc:after {
        opacity: 1;
        content: "\f0d7";
    }
    table.table thead tr th.order-asc:after {
        opacity: 1;
        content: "\f0d8";
    }
    table.table thead tr th.order.order-no:after {
        opacity: 0.4;
        content: "\f0dc";
    }
    table.table thead tr th.order:after {
        font-family: "FontAwesome";
        font-size: 14px;
        position: absolute;
        top: 8px;
        right: 5px;
        display: block;
        box-sizing: border-box;
    }

    .box .box-tools .search {
        display: inline-block;
        margin-left: 20px;
        width: 200px;
    }
    .box .box-tools .actions {
        display: inline-block;
        margin-left: 20px;
        vertical-align: top;
    }

    .box .overlay > .v-spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-left: -28px;
      margin-top: -28px;
    }
</style>
