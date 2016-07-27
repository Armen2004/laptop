app.controller('HomeController', ['$scope', '$uibModal', '$timeout', '$routeParams',
    function ($scope, $uibModal, $timeout, $routeParams) {

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

        if ($routeParams.token) {
            // $scope.token = $routeParams.token;
            $timeout(function () {
                angular.element('#resetModalShower').triggerHandler('click');
            });
        }

        $scope.signup = function () {

            if ($scope.$parent.$parent != null) {
                $scope.$parent.$parent.close();
            }

            $uibModal.open({
                templateUrl: 'templates/partials/register',
                controller: 'ModalController'
            })
        };

        $scope.login = function () {

            if ($scope.$parent.$parent != null) {
                $scope.$parent.$parent.close();
            }

            $uibModal.open({
                templateUrl: 'templates/partials/login',
                controller: 'ModalController'
            })
        };

        $scope.reset_email = function () {

            if ($scope.$parent.$parent != null) {
                $scope.$parent.$parent.close();
            }

            $uibModal.open({
                templateUrl: 'templates/partials/reset',
                controller: 'ModalController'
            })
        };

        $scope.reset_password = function () {

            if ($scope.$parent.$parent != null) {
                $scope.$parent.$parent.close();
            }

            $uibModal.open({
                templateUrl: 'templates/partials/recover',
                controller: 'ModalController'
            })
        }

    }]);