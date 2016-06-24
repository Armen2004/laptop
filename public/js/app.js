var app = angular.module('app', [
    'ngRoute', 'ngAnimate', 'ngSanitize', 'ngTouch', 'ui.bootstrap'
]);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'templates/home/index.blade.php',
            controller: 'HomeController'
        })
        .when('/hillfe', {
            templateUrl: 'templates/hillfe.html',
            controller: 'HilfeController'
        })
        .when('/caterer', {
            templateUrl: 'templates/caterer.html',
            controller: 'CatererController'
        })
        .when('/bestellen', {
            templateUrl: 'templates/bestellen.html',
            controller: 'BestellenController'
        })
        .otherwise({
            redirectTo: '/'
        });
}]);
