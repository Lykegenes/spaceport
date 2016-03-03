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

elixir(function(mix) {
    elixir.config.js.browserify.externals.push('vue', 'vue-resource', 'vue-router','vue-hot-reload-api', 'underscore');

    mix.vendor('core/vendor.js', 'public/js/vendor.js');

    mix.browserify('spaceport.js', 'public/js/spaceport.js');
    mix.sass('app.scss');
});
