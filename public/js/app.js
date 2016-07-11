var app = angular.module('app', [
    'ngRoute', 'ngAnimate', 'ngResource', 'ngSanitize', 'ngTouch', 'ui.bootstrap', 'toastr', '720kb.socialshare'
]);
app
    .constant('BASE_URL', 'http://laptop.dev/api/')
    .constant('SITE_URL', 'http://laptop.dev/')
    .constant('S3_URL', 'https://s3-us-west-2.amazonaws.com/laptopstartup/');

app.config(['$routeProvider', '$interpolateProvider', 'toastrConfig', function ($routeProvider, $interpolateProvider, toastrConfig) {
    
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

    angular.extend(toastrConfig, {
        closeButton: true
    });
    
    $routeProvider
        .when('/', {
            templateUrl: 'templates/home/index.blade.php',
            controller: 'HomeController',
            access: {
                restricted: false
            }
        })
        .when('/home', {
            templateUrl: 'templates/home/congratulations.blade.php',
            controller: 'AuthController',
            access: {
                restricted: true
            }
        })
        .when('/account', {
            templateUrl: 'templates/account/index.blade.php',
            controller: 'AccountController',
            access: {
                restricted: true
            }
        })
        .when('/posts', {
            templateUrl: 'templates/posts/index.blade.php',
            controller: 'PostsController',
            access: {
                restricted: true
            }
        })
        .when('/post/:postId', {
            templateUrl: 'templates/posts/show.blade.php',
            controller: 'PostsController',
            access: {
                restricted: true
            }
        })
        .when('/sales', {
            templateUrl: 'templates/sales/index.blade.php',
            controller: 'SalesController',
            access: {
                restricted: true
            }
        })
        .when('/lessons', {
            templateUrl: 'templates/lessons/index.blade.php',
            controller: 'LessonsController',
            access: {
                restricted: true
            }
        })
        .when('/lesson/:lessonId', {
            templateUrl: 'templates/lessons/show.blade.php',
            controller: 'LessonsController',
            access: {
                restricted: true
            }
        })
        .otherwise({
            redirectTo: '/'
        });
}]);

app.run(['$rootScope', '$location', 'AuthFactory', 'S3_URL', 'SITE_URL', function ($rootScope, $location, AuthFactory, S3_URL, SITE_URL) {

    $rootScope.S3_URL = S3_URL;
    $rootScope.SITE_URL = SITE_URL;

    $rootScope.$on('$routeChangeStart', function (event, next, current) {

        AuthFactory.checkUser().then(function (response) {
            $rootScope.isLoggedIn = response.data.loggedIn;
            $rootScope.userInfo = response.data.userInfo;

            if (next.access.restricted && $rootScope.isLoggedIn === false) {
                $location.path('/');
            }
        });

    });
}]);