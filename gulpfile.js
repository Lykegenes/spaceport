var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
require('./elixir-vendor');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    vue: './node_modules/vue/dist/vue.min.js',
    vue_resource: './node_modules/vue-resource/dist/vue-resource.min.js',
    vue_router: './node_modules/vue-router/dist/vue-router.min.js',
    underscore: './node_modules/underscore/underscore-min.js',
    bootstrap_js: './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
}

elixir(function(mix) {
    elixir.config.js.browserify.externals.push('vue', 'vue-resource', 'vue-router', 'underscore');

/*
    mix.combine([
        paths.vue,
        paths.vue_resource,
        paths.vue_router,
        paths.underscore,
        paths.bootstrap_js,
    ], 'public/js/vendor.js');
*/

    //mix.browserify('core/vendor.js', 'public/js/vendor.js');

    mix.vendor('core/vendor.js', 'public/js/vendor.js');

    mix.browserify('spaceport.js', 'public/js/spaceport.js');
    mix.sass('app.scss');
});
