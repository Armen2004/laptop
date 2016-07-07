app.controller('SalesController', ['$scope','$timeout', function ($scope,$timeout) {
    $scope.greeting = 'Hola!';

    $timeout(function () {
        ImageWidth();
    },200);


    function ImageWidth() {
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        var docHeight = $(document).height();
        if (winWidth < 991) {
            $('.content-left').height($('.full-height-container').height());
        }

        if (docHeight > winHeight) {
            $('.sales-page').css({"height": docHeight});

        } else {
            $('.sales-page').css({"height": winHeight});
        }

        $('.get-started-page').css({"width": winWidth, "height": winHeight});

    }


}]);