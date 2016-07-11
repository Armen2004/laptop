app.controller('LessonsController', ['$scope', '$routeParams', '$route', 'LessonFactory', function ($scope, $routeParams, $route, LessonFactory) {

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
    }


}]);