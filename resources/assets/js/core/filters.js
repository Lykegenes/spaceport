// return first element in array
Vue.filter('first', function (array) {
    return _.first(array)
})

// return last element in array
Vue.filter('last', function (array) {
    return _.last(array)
})
