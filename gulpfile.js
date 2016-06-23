var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix
        .copy('bower_components/angular/angular.min.js', 'resources/assets/js/angular.min.js')
        .copy('bower_components/angular-animate/angular-animate.min.js', 'resources/assets/js/angular-animate.min.js')
        .copy('bower_components/angular-resource/angular-resource.min.js', 'resources/assets/js/angular-resource.min.js')
        .copy('bower_components/angular-route/angular-route.min.js', 'resources/assets/js/angular-route.min.js')
        .copy('bower_components/angular-sanitize/angular-sanitize.min.js', 'resources/assets/js/angular-sanitize.min.js')
        .copy('bower_components/angular-touch/angular-touch.min.js', 'resources/assets/js/angular-touch.min.js')
        .copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'resources/assets/js/bootstrap.min.js')
        .copy('bower_components/jquery/dist/jquery.min.js', 'resources/assets/js/jquery.min.js')
        .copy('bower_components/moment/moment.js', 'resources/assets/js/moment.js')
        .copy('bower_components/placeholdem/placeholdem.min.js', 'resources/assets/js/placeholdem.min.js')
        .copy('bower_components/sliphover/src/jquery.sliphover.min.js', 'resources/assets/js/jquery.sliphover.min.js')
        .copy('bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js', 'resources/assets/js/ui-bootstrap-tpls.min.js')

        .copy('bower_components/select2/dist/js/select2.min.js', 'resources/assets/js/select2.min.js')
        // .copy('bower_components/ckeditor/ckeditor.js', 'resources/assets/js/ckeditor.js')

        .copy('bower_components/select2/dist/css/select2.min.css', 'resources/assets/less/select2.min.css')

        .copy('vendor/acacha/admin-lte-template-laravel/public/js/app.min.js', 'resources/assets/js/adminlte.min.js')

        .copy('bower_components/bootstrap/less/**/*.less', 'resources/assets/less/bootstrap')
        .copy('bower_components/font-awesome/less/**/*.less', 'resources/assets/less/font-awesome')

        .copy('vendor/acacha/admin-lte-template-laravel/resources/assets/less/admin-lte/**/*.less', 'resources/assets/less/admin-lte')
        .copy('vendor/acacha/admin-lte-template-laravel/resources/assets/less/app.less', 'resources/assets/less/app.less')


        .copy('bower_components/bootstrap/dist/fonts', 'public/fonts')
        .copy('bower_components/font-awesome/fonts', 'public/fonts')


        .less([
            'app.less',
            'admin-lte/AdminLTE.less',
            'bootstrap/bootstrap.less',
            'font-awesome/font-awesome.less',
            'select2.min.css'
        ], 'public/css/main.css')


        .scripts([
            'angular.min.js',
            'angular-animate.min.js',
            'angular-resource.min.js',
            'angular-route.min.js',
            'angular-sanitize.min.js',
            'angular-touch.min.js',
            'ui-bootstrap-tpls.min.js'
        ], 'public/js/angular.js')

        .scripts([
            'jquery.min.js',
            'bootstrap.min.js',
            'moment.js',
            'placeholdem.min.js',
            'jquery.sliphover.min.js',
            'adminlte.min.js',
            'select2.min.js',
            // 'ckeditor.js'
        ], 'public/js/main.js');

    mix.version([
        'css/main.css',
        'js/angular.js',
        'js/main.js'
    ]);

});
