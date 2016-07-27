app.controller('AuthController', ['$scope', '$location', '$timeout', 'toastr', 'AuthFactory', '$routeParams',
    function ($scope, $location, $timeout, toastr, AuthFactory, $routeParams) {

        $scope.email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if ($routeParams.token) {
            $scope.token = $routeParams.token;
        }

        $timeout(function () {
            Placeholdem(document.querySelectorAll('[placeholder]'));
        }, 100);

        $scope.user_login = function (user) {
            AuthFactory.doLogin(user).then(function (response) {

                // console.log('success');
                // console.log(response);
                var message;
                if (response.status == 200 && response.data.status) {
                    message = 'Logged in';
                    toastr.success(message);
                    $scope.$parent.close();
                    $location.path('/dashboard');
                } else {
                    message = 'These credentials do not match our records.';
                    toastr.error(message, 'Error');
                }

            }, function (error) {

                console.log('error');
                console.log(error);

                errorMessage(error.data)

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

                errorMessage(error.data)

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

                errorMessage(error.data)

            });
        };

        $scope.user_reset = function (user) {
            $scope.credentials = null;
            console.log(1)
            return
            AuthFactory.doReset(user).then(function (response) {

                // console.log('success');
                // console.log(response);

                var message;
                if (response.status == 200 && !response.data.status) {
                    message = 'These credentials do not match our records.';
                    toastr.error(message, 'Error');
                } else {
                    message = 'Please check your email';
                    toastr.success(message);
                    $scope.$parent.close();
                    // $location.path('/continue-registration');
                }

            }, function (error) {

                console.log('error');
                console.log(error);

                errorMessage(error.data)

            });
        };

        $scope.user_reset_password = function (user) {
            if ($scope.token == undefined) return;
            user.token = $scope.token;
            console.log(user);
            AuthFactory.doResetPassword(user).then(function (response) {

                console.log('success');
                console.log(response);
                var message;
                if (response.status == 200 && !response.data.status) {
                    message = 'These credentials do not match our records.';
                    toastr.error(message, 'Error');
                } else {
                    message = 'Your account successfully updated.';
                    toastr.success(message);
                    $scope.$parent.close();
                    $location.path('/dashboard');
                }

            }, function (error) {

                console.log('error');
                console.log(error);

                errorMessage(error.data);
                $location.path('/');
            });

        };

        function errorMessage(error) {
            var data = "";
            angular.forEach(error, function (value, key) {
                data += value + "<br/>";
            }, data);

            toastr.error(data, 'Error!');
        }

    }]);

