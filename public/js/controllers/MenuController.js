app.controller('MenuController', ['$scope', '$location', 'LessonFactory',
    function ($scope, $location, LessonFactory) {

        $scope.isCollapsed = true;

        LessonFactory.getCourses().then(function (response) {
            $scope.courses = response.data;
            $scope.completedLessons = completedLesson($scope.courses);


        }, function (error) {
            console.log(error)
        });

        $scope.goTo = function (lessonId) {
            $location.path('/lesson/' + lessonId);
        };

    }]);

function completedLesson(data) {
    var completedLessons = 0;
    var countLessons = 0;
    if (data != undefined) {
        angular.forEach(data, function (value, index) {
            if(value.lessons == undefined) {
                if (value.users != undefined && value.users.length > 0) {
                    completedLessons++;
                }
                countLessons = data.length;
            }else{
                angular.forEach(value.lessons, function (val, index) {
                    if (val.users.length > 0) {
                        completedLessons++;
                    }
                });

                countLessons += value.lessons.length;
            }
        })
    }
    return (completedLessons*100)/countLessons;
}