/**
 * SparkForm helper class. Used to set common properties on all forms.
 */
window.SpaceportForm = function (data) {
    var form = this;

    _.extend(this, data)

    this.fields = {}

    this.errors = new SpaceportFormErrors();
    this.busy = false;
    this.successful = false;

    this.startProcessing = function () {
        form.errors.forget();
        form.busy = true;
        form.successful = false;
    };

    this.finishProcessing = function () {
        form.busy = false;
        form.successful = true;
    };

    this.initFormFieldsFromListColumnsDefaults = function (listColumns) {
        // copy each column name in the form, and set it to an empty value
        var obj = {}
        _.each(listColumns.all(), function (col) {
            obj[col.title] = ''
        })

        // We must extend a new Object to trigger Vue.js reactivity
        this.fields = _.extend({}, this.fields, obj)
    };

    this.fillFormFieldsFromListItem = function (listColumns, listItem) {
        // set every form field to this item's matching attribute, if it exists
        var obj = {}
        _.each(listColumns.all(), function (col) {
            obj[col.title] = listItem.get(col.title)
        })

        // We must extend a new Object to trigger Vue.js reactivity
        this.fields = _.extend({}, this.fields, obj)
    };
};
