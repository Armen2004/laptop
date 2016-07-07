app.controller('ModalController', ['$scope', '$uibModalInstance', '$timeout', 'AuthFactory', 'toastr', '$location', function ($scope, $uibModalInstance, $timeout, AuthFactory, toastr, $location) {
    $scope.greeting = 'Hola!';

    $timeout(function(){
        Placeholdem( document.querySelectorAll( '[placeholder]' ) );
    }, 100);

    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };

    $scope.register = function (user) {
        AuthFactory.doRegister(user).then(function( response ) {

            console.log('success');
            console.log(response);
            var message;
            if (response.status == 200 && !response.data.status){
                message = 'These credentials do not match our records.';
                toastr.error(message, 'Error');
            }else {
                message = 'Logged in';
                toastr.success(message);
                $scope.close();
                $location.path('/account');
            }

        }, function (error) {

            console.log('error');
            console.log(error);
            var message;
            if(error.status == 422){
                message = error.data.email[0];
            }else{
                message = 'Request Failed!';
            }
            toastr.error(message, 'Error');

        });
    }
}]);