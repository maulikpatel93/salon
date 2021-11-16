const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js("resources/js/app.js", "public/js")
// .js("node_modules/bootstrap/dist/js/bootstrap.bundle.js", "public/js")
//     .js("node_modules/jquery/dist/jquery.min.js", "public/js")
//     .sass("resources/sass/app.scss", "public/css")
//     .sass("resources/sass/styles.scss", "public/css");
mix.js("resources/js/app.js", "public/js")
    .js("resources/js/jquery.js", "public/js")
    //css
    .copy(
        "node_modules/dependent-dropdown/css/dependent-dropdown.min.css",
        "public/plugins/dependent-dropdown/css"
    )
    .sass(
        "node_modules/sweetalert2/src/sweetalert2.scss",
        "public/plugins/sweetalert2/css"
    )
    //js
    .copy("vendor/jquery-form/form/dist/jquery.form.min.js", "public/js")
    .copy(
        "node_modules/icheck-bootstrap/icheck-bootstrap.min.css",
        "public/plugins/icheck-bootstrap"
    )
    .copy(
        "node_modules/jquery-pjax/jquery.pjax.js",
        "public/plugins/jquery-pjax"
    )
    .copy(
        "node_modules/dependent-dropdown/js/dependent-dropdown.min.js",
        "public/plugins/dependent-dropdown/js"
    )
    .js(
        "node_modules/sweetalert2/src/sweetalert2.js",
        "public/plugins/sweetalert2/js"
    )
    .copy("resources/js/grid.js", "public/js")
    .copy("resources/js/sweetalert2.js", "public/js")
    .js("resources/js/library/AdminLTE.js", "public/js")
    .copy("resources/js/library/adminlte.min.js", "public/js")
    .copy("resources/js/library/demo.js", "public/js")
    .copy("resources/js/myfunction.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/styles.scss", "public/css");

if (!mix.inProduction()) {
    mix.sourceMaps();
    mix.webpackConfig({ devtool: "inline-source-map" });
}