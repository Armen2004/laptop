app.controller('HomeController', ['$scope', '$uibModal', '$timeout', 
    function ($scope, $uibModal, $timeout) {

    $scope.email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    $('#demo').pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
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

}]);