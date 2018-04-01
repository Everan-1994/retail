let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/everans/js/vue.min.js', 'public/everans/js')
    .copyDirectory('resources/assets/everans/js/axios.min.js', 'public/everans/js')
    .copyDirectory('resources/assets/everans/js/iview.min.js', 'public/everans/js')
    .copyDirectory('resources/assets/everans/js/nprogress.js', 'public/everans/js')
    .copyDirectory('resources/assets/everans/css/iview.css', 'public/everans/css')
    .copyDirectory('resources/assets/everans/css/nprogress.css', 'public/everans/css')
    .copyDirectory('resources/assets/everans/images/everan.gif', 'public/everans/images');
