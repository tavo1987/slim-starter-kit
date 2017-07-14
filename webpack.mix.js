let mix = require('laravel-mix');

/**
 * We'll load jQuery globaly, uncomment if you need it's
 */

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

mix.setPublicPath('./');
mix.js('resources/assets/js/app.js', 'js/app.min.js')
    .sass('resources/assets/sass/app.scss', 'css/app.min.css')
    .options({
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


