app.service('AuthService', ['AuthFactory', function (AuthFactory) {

    this.isLoggedIn = function () {
        return AuthFactory.checkUser();
    }

}]);