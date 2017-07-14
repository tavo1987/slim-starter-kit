let mix = require('laravel-mix');


mix.setPublicPath('./');
mix.js('resources/assets/js/app.js', 'js/app.min.js')
    .sass('resources/assets/sass/app.scss', 'css/app.min.css')
    .mix.options({
        processCssUrls: false,
    })
    .browserSync({
        proxy: 'mini-framework.dev',
        files: [
            './resources/views/**/*.twig',
            './js/**/*',
            './css/**/*',
        ]
    })


