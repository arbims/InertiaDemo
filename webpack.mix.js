const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
    .js('assets/js/app.js', 'webroot/js').vue(3)
    .sass('assets/sass/app.scss', 'webroot/css')
    .version().disableNotifications();
