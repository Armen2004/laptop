app.controller('AccountController', ['$scope', '$location', function ($scope, $location) {

    $('#sliphover').sliphover({
        height: '100%',
        fontColor: '#fff',
        fontSize: '24px'
    });
    
    $scope.goTo = function (goTo) {
        $location.path(goTo);
    }
}]);