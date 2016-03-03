window.SpaceportRouter = new VueRouter({
    //hashbang: true,
    //history: true,
    linkActiveClass: "active",
    //mode: 'html5',
    //root: '/cms',
    saveScrollPosition: true,
    transitionOnLoad: true
});

SpaceportRouter.map({
    '/': {
        component: require('./../views/lists.vue'),
    },
    '/lists': {
        component: require('./../views/lists.vue'),
        subRoutes: {
            '/': {
                name: 'list.index',
                component: require('./../lists/list-index.vue'),
            },
            '/create': {
                name: 'list.create',
                component: require('./../lists/list-create.vue'),
            },
            '/:listId/show': {
                name: 'list.show',
                component: require('./../lists/list-show.vue'),
            },
            '/:listId/edit': {
                name: 'list.edit',
                component: require('./../lists/list-edit.vue'),
            },
            '/:listId/columns': {
                name: 'list.columns',
                component: require('./../lists/list-edit.vue'),
            },
            '/:listId/columns/create': {
                name: 'column.create',
                component: require('./../columns/column-create.vue'),
            },
        },
    },
});
