/**
 * SparkForm helper class. Used to set common properties on all forms.
 */
window.SpaceportForm = function (data) {
    var form = this;

    _.extend(this, data)

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
};
