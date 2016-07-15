app.controller('AuthController', ['$scope', '$location', '$timeout', 'toastr', 'AuthFactory',
    function ($scope, $location, $timeout, toastr, AuthFactory) {
    
    $timeout(function(){
        Placeholdem( document.querySelectorAll( '[placeholder]' ) );
    }, 100);
    
    $scope.user_login = function (user) {
        AuthFactory.doLogin(user).then(function (response) {

            // console.log('success');
            // console.log(response);
            var message;
            if (response.status == 200 && response.data.status) {
                message = 'Logged in';
                toastr.success(message);
                $location.path('/dashboard');
            } else {
                message = 'These credentials do not match our records.';
                toastr.error(message, 'Error');
            }

        }, function (error) {

            console.log('error');
            console.log(error);
            var message;
            if (error.status == 422) {
                message = error.data.email[0];
            } else {
                message = 'Request Failed!';
            }
            toastr.error(message, 'Error');

        });
    };

    $scope.user_register = function (user) {
        AuthFactory.doRegister(user).then(function (response) {

            // console.log('success');
            // console.log(response);
            var message;
            if (response.status == 200 && !response.data.status) {
                message = 'These credentials do not match our records.';
                toastr.error(message, 'Error');
            } else {
                message = 'Logged in';
                toastr.success(message);
                $scope.$parent.close();
                $location.path('/continue-registration');
            }

        }, function (error) {

            console.log('error');
            console.log(error);
            var message;
            if (error.status == 422) {
                message = error.data.email[0];
            } else {
                message = 'Request Failed!';
            }
            toastr.error(message, 'Error');

        });
    };

    $scope.user_logout = function () {
        AuthFactory.doLogout().then(function (response) {

            // console.log('success');
            // console.log(response);
            var message;
            if (response.status == 200 && response.data.status) {
                message = 'Logged out successfully!';
                toastr.success(message);
                $location.path('/');
            } else {
                message = 'Error!';
                toastr.error(message, 'Error');
            }

        }, function (error) {

            console.log('error');
            console.log(error);
            toastr.error('Request Failed!', 'Error');

        });
    };

}]);