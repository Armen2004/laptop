app.controller('HomeController', ['$scope', '$uibModal', '$timeout', 'AuthFactory', 'toastr', '$location', function ($scope, $uibModal, $timeout, AuthFactory, toastr, $location) {

    $scope.email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    $('#demo').pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
    });

    AuthFactory.checkUser().then(function (response) {
        $scope.loggedIn = response.data.loggedIn
    });

    $timeout(function () {
        Placeholdem(document.querySelectorAll('[placeholder]'));
    }, 100);

    $scope.signup = function (size) {
        $uibModal.open({
            templateUrl: 'templates/partials/modal.blade.php',
            controller: 'ModalController'
        })
    };

    $scope.user_login = function (user) {
        AuthFactory.doLogin(user).then(function (response) {

            // console.log('success');
            // console.log(response);
            var message;
            if (response.status == 200 && !response.data.status) {
                message = 'These credentials do not match our records.';
                toastr.error(message, 'Error');
            } else {
                message = 'Logged in';
                toastr.success(message);
                $location.path('/account');
            }

        }, function (error) {

            // console.log('error');
            // console.log(error);
            var message;
            if (error.status == 422) {
                message = error.data.email[0];
            } else {
                message = 'Request Failed!';
            }
            toastr.error(message, 'Error');

        });
    }

}]);