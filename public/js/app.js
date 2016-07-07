var app = angular.module('app', [
    'ngRoute', 'ngAnimate', 'ngResource', 'ngSanitize', 'ngTouch', 'ui.bootstrap', 'toastr'
]);
app.constant('BASE_URL', 'http://laptop.dev/api/');

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.config(function (toastrConfig) {
    angular.extend(toastrConfig, {
        closeButton: true
    });
});

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'templates/home/index.blade.php',
            controller: 'HomeController'
        })
        .when('/home', {
            templateUrl: 'templates/home/congratulations.blade.php',
            controller: 'AuthController'
        })
        .when('/account', {
            templateUrl: 'templates/account/index.blade.php',
            controller: 'AccountController'
        })
        .when('/posts', {
            templateUrl: 'templates/posts/index.blade.php',
            controller: 'PostsController'
        })
        .when('/post/:postId', {
            templateUrl: 'templates/posts/show.blade.php',
            controller: 'PostsController'
        })
        .when('/sales', {
            templateUrl: 'templates/sales/index.blade.php',
            controller: 'SalesController'
        })
        .when('/lessons', {
            templateUrl: 'templates/lessons/index.blade.php',
            controller: 'LessonsController'
        })
        .when('/lesson/:lessonId', {
            templateUrl: 'templates/lessons/show.blade.php',
            controller: 'LessonsController'
        })
        .otherwise({
            redirectTo: '/'
        });
}]);