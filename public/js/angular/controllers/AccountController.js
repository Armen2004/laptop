app.controller('AccountController', ['$scope', '$location', function ($scope, $location) {

    $scope.goTo = function (goTo) {
        $location.path(goTo);
    };

}]);