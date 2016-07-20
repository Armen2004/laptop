app.controller('ForumController', ['$scope', 'ForumFactory', function ($scope, ForumFactory) {

    ForumFactory.getForums().then(function (response) {
        console.log(response)
        $scope.forums = response.data;
    }, function (error) {
        console.log(error)
    })
}]);