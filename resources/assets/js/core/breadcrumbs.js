/**
 * Global object containing Vue views titles and breadcrumbs.
 */
window.SpaceportHeaderData = {
    titles: ['Spaceport'],
    breadcrumbs: ['Spaceport'],
}

/**
 * Vue Mixin for views titles and breadcrumbs.
 */
window.SpaceportHeaderMixin = {
  methods: {
    setHeaderTitle: function (text) {
        Vue.set(SpaceportHeaderData.titles, this._titleIndex, text)
    },
    setBreadcrumb: function(text) {
        Vue.set(SpaceportHeaderData.breadcrumbs, this._breadcrumbIndex, text)
    }
  },
  route: {
    activate: function (transition) {
        this._titleIndex = SpaceportHeaderData.titles.length
        SpaceportHeaderData.titles.length++

        this._breadcrumbIndex = SpaceportHeaderData.breadcrumbs.length
        SpaceportHeaderData.breadcrumbs.length++
        transition.next()
    },
    deactivate: function (transition) {
        SpaceportHeaderData.titles.splice(this._titleIndex, 1)
        SpaceportHeaderData.breadcrumbs.splice(this._breadcrumbIndex, 1)
        transition.next()
    }
  }
}
