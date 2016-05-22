import SpaceportFormErrors from './SpaceportFormErrors.js'

class SpaceportForm {

    constructor(data) {
        _.extend(this, data)

        this.fields = {}
        this.errors = new SpaceportFormErrors();
        this.busy = false;
        this.successful = false;
    }

    startProcessing() {
        this.errors.forget();
        this.busy = true;
        this.successful = false;
    };

    finishProcessing() {
        this.busy = false;
        this.successful = true;
    };

    initFormFieldsFromListColumnsDefaults(listColumns) {
        // copy each column name in the form, and set it to an empty value
        var obj = {}
        _.each(listColumns.all(), function (col) {
            obj[col.title] = ''
        })

        // We must extend a new Object to trigger Vue.js reactivity
        this.fields = _.extend({}, this.fields, obj)
    };

    fillFormFieldsFromListItem(listColumns, listItem) {
        // set every form field to this item's matching attribute, if it exists
        var obj = {}
        _.each(listColumns.all(), function (col) {
            obj[col.title] = listItem.get(col.title)
        })

        // We must extend a new Object to trigger Vue.js reactivity
        this.fields = _.extend({}, this.fields, obj)
    };
};
