const mix = require("laravel-mix");

mix.sass("resources/sass/app.scss", "public/css/app.css")
    .options({
        processCssUrls: false
    })
    .styles(
        [
            "resources/vendor/fontawesome/all.min.css",
            "resources/vendor/fontawesome/brands.min.css",
            "resources/vendor/fontawesome/fontawesome.min.css",
            "resources/vendor/fontawesome/regular.min.css",
            "resources/vendor/fontawesome/solid.min.css",
            "resources/vendor/fontawesome/svg-with-js.min.css",
            "resources/vendor/css/fresco.css",
            "resources/vendor/css/animate.css",
            "resources/vendor/css/owl.carousel.css"
        ],
        "public/css/plantilla.css"
    )
    .scripts(
        [
            "resources/vendor/js/plugins/jquery-3.5.1.min.js",
            "resources/vendor/js/plugins/jquery.waypoints.min.js",
            "resources/vendor/js/plugins/fresco.js",
            "resources/vendor/js/plugins/jquery.counterup.js",
            "resources/vendor/js/plugins/owl.carousel.js",
            "resources/vendor/js/plugins/wow.min.js",
            "resources/vendor/js/plugins/swiper.min.js",
            "resources/vendor/js/plugins/bootstrap.bundle.min.js",
            "resources/vendor/js/plugins/bootstrap.min.js"
        ],
        "public/js/plantilla.js"
    )
    .scripts("resources/vendor/js/core.js", "public/js/core.js")
    .copy("resources/vendor/fontawesome/webfonts", "public/webfonts")
    .copy("resources/vendor/css/fresco", "public/css/fresco")
    .version();
