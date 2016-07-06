app.service('AuthService', ['$scope', function ($scope) {
    this.user = {};

    this.getUserCredentials = function () {
        return this.user;
    };

    this.setUserCredentials = function (user) {
        return angular.copy(user, this.user);
    }
    
}]);