let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

mix.setPublicPath('./public')
    .js('resources/assets/js/app.js', 'public/js/app.min.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app.min.css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.js') ],
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
    .purgeCss({
        globs: [
            path.join(__dirname, "./resources/views/**/*.twig"),
            path.join(__dirname, "./resources/views/**/*.vue"),
        ],
        extensions: ['html', 'js', 'jsx', 'php', 'vue', 'twig'],
    });
