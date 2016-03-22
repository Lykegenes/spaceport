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
    '/settings': {
        name: 'settings',
        component: require('./../views/settings.vue'),
        subRoutes: {
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
                    '/:listId/columns/:columnId': {
                        name: 'column.edit',
                        component: require('./../columns/column-edit.vue'),
                    },
                },
            },
            'users' : {
                component: require('./../views/users.vue'),
                subRoutes: {
                    '/': {
                        name: 'users.index',
                        component: require('./../users/user-index.vue'),
                    },
                    '/invite': {
                        name: 'users.invite',
                        component: require('./../users/user-invite.vue'),
                    },
                },
            },
        },
    },
    '/list/:listId': {
        name: 'view.list',
        component: require('./../list-row-test.vue'),
    },
    '/list/:listId/item/:itemId': {
        name: 'view.list.item',
        component: require('./../list-item-show.vue'),
    },
});
