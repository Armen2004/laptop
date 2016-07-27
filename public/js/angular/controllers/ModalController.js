app.controller('ModalController', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {

    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };
    
}]);