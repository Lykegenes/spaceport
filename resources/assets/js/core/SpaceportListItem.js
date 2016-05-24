class SpaceportListItem {

    constructor() {
        this.fields = {}
    }

    /**
     * Set the raw errors for the collection.
     */
    set(fields) {
        if (typeof fields === 'object') {
            this.fields = fields;
        } else {
            //this.errors = {'field': ['Something went wrong. Please try again.']};
        }
    }

    /**
     * Determine if the collection has errors for a given field.
     */
    has(field) {
        return _.indexOf(_.keys(this.fields), field) > -1;
    }

    /**
     * Get the first error message for a given field.
     */
    get(field) {
        if (this.has(field)) {
            return this.fields[field];
        }
    }
}

export default SpaceportListItem;
