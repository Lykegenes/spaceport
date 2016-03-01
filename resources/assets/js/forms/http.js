module.exports = {
    /**
     * A few helper methods for making HTTP requests and doing common form actions.
     */
    post: function (uri, form) {
        return Spaceport.sendForm('post', uri, form);
    },


    put: function (uri, form) {
        return Spaceport.sendForm('put', uri, form);
    },


    delete: function (uri, form) {
        return Spaceport.sendForm('delete', uri, form);
    },

    sendForm: function (method, uri, form) {
        return new Promise(function (resolve, reject) {
            form.startProcessing

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
    },
};
