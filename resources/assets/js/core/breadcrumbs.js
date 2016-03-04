// http://jsfiddle.net/22d08ed4/1/

window.breadcrumbsData = ['Main'];

window.SpaceportBreadcrumbs = {

    methods: {
        setBreadcrumb: function(text) {
            Vue.set(breadcrumbsData, this._breadcrumbIndex, text)
        }
    },

    route: {
        activate: function (transition) {
            this._breadcrumbIndex = breadcrumbsData.length
            breadcrumbsData.length++
            transition.next()
        },

        deactivate: function (transition) {
            breadcrumbsData.splice(this._breadcrumbIndex, 1)
            transition.next()
        },
    },
}
