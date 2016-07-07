app.service('AuthService', ['$http', '$location', function ($http, $location) {

    this.auth = function () {
        $http({method: "GET", url: "auth/check/" + role})
            .success(function (response) {
                if (response.success == 0) {
                    $location.path('login');
                }
            });
    }

}]);