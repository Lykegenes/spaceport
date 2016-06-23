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

    // All Spaceport vendors CSS.
    mix.sass('vendor.scss', 'public/dist/css/vendor.css')
        .copy('node_modules/font-awesome/fonts', 'public/dist/fonts')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/dist/fonts');

    // Exclude vendors from Spaceport.js
    elixir.config.js.browserify.externals.push('vue', 'vue-resource', 'vue-router', 'underscore');

    // Compile the external vendors in their own file
    mix.vendor('core/vendor.js', 'public/dist/js/vendor.js');

    // Compile the Spaceport Vue application
    mix.browserify('spaceport.js', 'public/dist/js/spaceport.js', null, {
        paths: ['./node_modules', './resources/assets/js']
    });
});
