window.SpaceportListColumns = function () {
    this.columns = {}

    /**
     * Set the raw errors for the collection.
     */
    this.set = function (columns) {
        if (typeof columns === 'object') {
            this.columns = columns;
        } else {
            //this.errors = {'field': ['Something went wrong. Please try again.']};
        }
    };

    /**
     * Determine if the collection has errors for a given field.
     */
    this.has = function (column) {
        return _.indexOf(_.keys(this.columns), column) > -1;
    };

    /**
     * Get all of the raw errors for the collection.
     */
    this.all = function () {
        return this.columns;
    };

    /**
     * Get the first error message for a given column.
     */
    this.get = function (column) {
        if (this.has(column)) {
            return this.columns[column];
        }
    };

    this.findByTitle = function(title) {
        var found = _.find(this.columns, function(col) {
            return col.title === title
        })

        return _.isUndefined(found) ? null : found
    };
};
