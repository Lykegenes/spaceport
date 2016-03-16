/**
 * Global object containing Vue views titles and breadcrumbs.
 */
window.Spaceport.HeaderData = {
    titles: ['Spaceport'],
    breadcrumbs: ['Spaceport'],
}

/**
 * Vue Mixin for views titles and breadcrumbs.
 */
window.Spaceport.HeaderMixin = {

    methods: {
        setHeaderTitle: function (text) {
            Vue.set(Spaceport.HeaderData.titles, this._titleIndex, text)
        },

        setBreadcrumb: function(text) {
            Vue.set(Spaceport.HeaderData.breadcrumbs, this._breadcrumbIndex, text)
        }
    },

    route: {
        activate: function (transition) {
            this._titleIndex = Spaceport.HeaderData.titles.length
            Spaceport.HeaderData.titles.length++

            this._breadcrumbIndex = Spaceport.HeaderData.breadcrumbs.length
            Spaceport.HeaderData.breadcrumbs.length++
            transition.next()
        },

        deactivate: function (transition) {
            Spaceport.HeaderData.titles.splice(this._titleIndex, 1)
            Spaceport.HeaderData.breadcrumbs.splice(this._breadcrumbIndex, 1)
            transition.next()
        }
    },

}
