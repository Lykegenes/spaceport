window.SpaceportListItem = function () {
    this.fields = {}

    /**
     * Set the raw errors for the collection.
     */
    this.set = function (fields) {
        if (typeof fields === 'object') {
            this.fields = fields;
        } else {
            //this.errors = {'field': ['Something went wrong. Please try again.']};
        }
    };

    /**
     * Determine if the collection has errors for a given field.
     */
    this.has = function (field) {
        return _.indexOf(_.keys(this.fields), field) > -1;
    };

    /**
     * Get the first error message for a given field.
     */
    this.get = function (field) {
        if (this.has(field)) {
            return this.fields[field];
        }
    };
};
