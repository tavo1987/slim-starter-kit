let mix = require('laravel-mix');

mix.setPublicPath('./');

mix.sass('resources/assets/sass/app.scss', 'css/app.min.css')
    .js('resources/assets/js/app.js', 'js/app.min.js')
    .options({
        processCssUrls: false,
    })
    .browserSync({
        proxy: 'mini-framework.dev',
        files: [
            './resources/views/**/*.twig',
            './css/**/*.css',
            './js/**/*.js',
        ],
        injectChanges: true,
    })


