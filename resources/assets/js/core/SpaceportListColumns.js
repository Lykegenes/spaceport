class SpaceportListColumns {

    constructor() {
        this.columns = {}
    }

    /**
     * Set the raw errors for the collection.
     */
    set(columns) {
        if (typeof columns === 'object') {
            this.columns = columns;
        } else {
            //this.errors = {'field': ['Something went wrong. Please try again.']};
        }
    }

    /**
     * Determine if the collection has errors for a given field.
     */
    has(column) {
        return _.indexOf(_.keys(this.columns), column) > -1;
    }

    /**
     * Get all of the raw errors for the collection.
     */
    all() {
        return this.columns;
    }

    /**
     * Get the first error message for a given column.
     */
    get(column) {
        if (this.has(column)) {
            return this.columns[column];
        }
    }

    findByTitle(title) {
        var found = _.find(this.columns, function(col) {
            return col.title === title
        })

        return _.isUndefined(found) ? null : found
    }
}

export default SpaceportListColumns;
