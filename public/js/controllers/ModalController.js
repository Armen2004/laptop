app.controller('ModalController', ['$scope', '$uibModalInstance', '$timeout', 'AuthFactory', function ($scope, $uibModalInstance, $timeout, AuthFactory) {
    $scope.greeting = 'Hola!';

    $timeout(function(){
        Placeholdem( document.querySelectorAll( '[placeholder]' ) );
    }, 100);

    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };

    $scope.register = function (user) {
        AuthFactory.doRegister(user);
    }
}]);