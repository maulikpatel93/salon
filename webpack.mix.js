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
    //jquery-form
    .copy("vendor/jquery-form/form/dist/jquery.form.min.js", "public/js")
    //jquery-pjax
    .copy(
        "node_modules/jquery-pjax/jquery.pjax.js",
        "public/plugins/jquery-pjax"
    )
    //icheck-bootstrap
    .copyDirectory(
        "node_modules/icheck-bootstrap/",
        "public/plugins/icheck-bootstrap"
    )
    //dependent-dropdown
    .copyDirectory(
        "node_modules/dependent-dropdown/css/",
        "public/plugins/dependent-dropdown/css"
    )
    .copyDirectory(
        "node_modules/dependent-dropdown/js/",
        "public/plugins/dependent-dropdown/js"
    )
    .copyDirectory(
        "node_modules/dependent-dropdown/img/",
        "public/plugins/dependent-dropdown/img"
    )
    //sweetalert2
    .copyDirectory(
        "node_modules/sweetalert2/dist/",
        "public/plugins/sweetalert2"
    )
    //input mask
    .copyDirectory("node_modules/inputmask/dist/", "public/plugins/inputmask")
    .copyDirectory("node_modules/select2/dist/", "public/plugins/select2")
    .copyDirectory("node_modules/handlebars/dist/", "public/plugins/handlebars")
    .copy("resources/js/grid.js", "public/js")
    .copy("resources/assets/cloneData/cloneData.js", "public/js")
    .copy("resources/js/sweetalert2.js", "public/js")
    .js("resources/js/library/AdminLTE.js", "public/js")
    .copy("resources/js/library/adminlte.min.js", "public/js")
    .copy("resources/js/library/demo.js", "public/js")
    .copy("resources/js/myfunction.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/styles.scss", "public/css")
    .js("resources/src/index.js", "public/src")
    .react();

if (!mix.inProduction()) {
    mix.sourceMaps();
    mix.webpackConfig({ devtool: "inline-source-map" });
}