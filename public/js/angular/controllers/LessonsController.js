app.controller('LessonsController', ['$scope', '$routeParams', '$location', '$route', 'LessonFactory',
    function ($scope, $routeParams, $location, $route, LessonFactory) {

    if ($routeParams.lessonId) {
        LessonFactory.getLesson($routeParams.lessonId).then(function (response) {
            $scope.lesson = response.data;
        }, function (error) {
            console.log(error)
        });
    }

    $scope.complete_lesson = function (lessonId) {
        LessonFactory.completeLesson(lessonId).then(function (response) {
            $route.reload();
        }, function (error) {
            console.log(error)
        });
    };

    $scope.previousLesson = function (lessonID) {
        LessonFactory.getPreviousLesson(lessonID).then(function (response) {
            if (response.data.slug != undefined)
                $location.path('/lesson/' + response.data.slug);
        }, function (error) {
            console.log(error)
        });
    };

    $scope.nextLesson = function (lessonID) {
        LessonFactory.getNextLesson(lessonID).then(function (response) {
            if (response.data.slug != undefined)
                $location.path('/lesson/' + response.data.slug);

        }, function (error) {
            console.log(error)
        });
    };


}]);