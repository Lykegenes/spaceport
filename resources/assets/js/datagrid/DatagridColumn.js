window.SpaceportDatagridColumns = function (data) {

    this.columns = {}

    this.initColumnsFromViewColumns = function (viewColumns) {
        // instantiate each column properly
        var obj = {}
        _.each(viewColumns, function (col) {
            obj[col.key] = {
                key: col.key,
                name: col.name,
                sortable: true,
                searchable: true,
            }
        })

        // We must extend a new Object to trigger Vue.js reactivity
        this.columns = _.extend({}, this.columns, obj)
    };

}
