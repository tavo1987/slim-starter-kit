let mix = require('laravel-mix');

mix.setPublicPath('./public');

mix.sass('resources/assets/sass/app.scss', 'public/css/app.min.css')
    .js('resources/assets/js/app.js', 'public/js/app.min.js')
    .options({
        processCssUrls: false,
    })
    .browserSync({
        notify: false,
        proxy: 'slim-starter-kit.test',
        files: [
            './resources/views/**/*.twig',
            './public/css/**/*.css',
            './public/js/**/*.js',
        ],
        injectChanges: true,
    })


