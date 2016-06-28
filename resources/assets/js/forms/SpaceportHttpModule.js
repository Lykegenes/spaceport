module.exports = class SpaceportHttpModule {
    /**
     * A few helper methods for making HTTP requests and doing common form actions.
     */
    static post(uri, form) {
        return this.sendForm('post', uri, form);
    }


    static put(uri, form) {
        return this.sendForm('put', uri, form);
    }


    static deleteForm(uri, form) {
        return this.sendForm('delete', uri, form);
    }

    static sendForm(method, uri, form) {
        return new Promise(function (resolve, reject) {
            form.startProcessing();

            Vue.http[method](uri, JSON.stringify(form))
                .then(function (response) {
                    form.finishProcessing();

                    resolve(response);
                }, function (errors) {
                    form.errors.set(errors.data);
                    form.busy = false;

                    reject(errors);
                })
        });
    }
}
