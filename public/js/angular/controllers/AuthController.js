app.controller('AuthController', ['$scope', '$rootScope', '$location', '$timeout', 'toastr', 'AuthFactory', '$routeParams',
    function ($scope, $rootScope, $location, $timeout, toastr, AuthFactory, $routeParams) {

        $scope.email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        $rootScope.loading = false;

        if ($routeParams.token) {
            $scope.token = $routeParams.token;
        }

        $timeout(function () {
            Placeholdem(document.querySelectorAll('[placeholder]'));
        }, 100);

        $scope.user_login = function (user) {
            $rootScope.loading = true;
            AuthFactory.doLogin(user).then(function (response) {
                $rootScope.loading = false;

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
                $rootScope.loading = false;

                console.log('error');
                console.log(error);

                errorMessage(error.data)

            });
        };

        $scope.user_register = function (user) {
            $rootScope.loading = true;
            AuthFactory.doRegister(user).then(function (response) {
                $rootScope.loading = false;

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
                $rootScope.loading = false;

                console.log('error');
                console.log(error);

                errorMessage(error.data)

            });
        };

        $scope.user_logout = function () {
            $rootScope.loading = true;
            AuthFactory.doLogout().then(function (response) {
                $rootScope.loading = false;

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
                $rootScope.loading = false;

                console.log('error');
                console.log(error);

                errorMessage(error.data)

            });
        };

        $scope.user_reset = function (user) {
            $rootScope.loading = true;
            AuthFactory.doReset(user).then(function (response) {
                $rootScope.loading = false;

                console.log('success');
                console.log(response);

                var message;
                if (response.status == 200 && !response.data.status) {
                    message = 'Error!';
                    toastr.error(message, 'Error');
                } else {
                    message = 'Please check your email';
                    toastr.success(message);
                    $scope.$parent.close();
                    // $location.path('/continue-registration');
                }

            }, function (error) {
                $rootScope.loading = false;

                console.log('error');
                console.log(error);

                errorMessage(error.data)

            });
        };

        $scope.user_reset_password = function (user) {
            $rootScope.loading = true;
            if ($scope.token == undefined) return;
            user.token = $scope.token;
            // console.log(user);
            AuthFactory.doResetPassword(user).then(function (response) {
                $rootScope.loading = false;

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
                $rootScope.loading = false;

                console.log('error');
                console.log(error);

                errorMessage(error.data);
                $location.path('/');
            });

        };

        $scope.upload = function (file, event, flow) {
            flow.upload()
        };

        $scope.success = function (file, message, flow) {
            message = JSON.parse(message);
            toastr.success(message.message);
            $rootScope.userInfo.image =  message.image;
            flow.cancel();
            $scope.$parent.close();
        };

        $scope.error = function (file, message, flow) {
            errorMessage('Something happened please try again later.');
            flow.cancel();
            $scope.$parent.close();
        };


        function errorMessage(error) {
            var data = "";
            if (angular.isString(error)) {
                data = "Error!!!";
            } else {
                angular.forEach(error, function (value, key) {
                    data += value + "<br/>";
                }, data);
            }
            toastr.error(data, 'Error!');
        }

    }]);

