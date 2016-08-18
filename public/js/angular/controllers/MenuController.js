app.controller('MenuController', ['$rootScope', '$scope', '$uibModal', '$location', '$interval', 'LessonFactory',
    function ($rootScope, $scope, $uibModal, $location, $interval, LessonFactory) {

        $scope.trial = true;

        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };

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

        $scope.change_image = function () {
            $uibModal.open({
                templateUrl: 'templates/partials/profile_image',
                controller: 'ModalController'
            })
        };

        if (document.getElementById('countdown')) {
            $scope.startTimer();
        }

        var interval;

        $scope.startTimer = function () {
            if (angular.isDefined(interval)) return;

            var countdown = document.getElementById('countdown');

            var end_date = new Date($rootScope.userInfo.created_at).getTime() + (7 * 24 * 60 * 60 * 1000);
            // var end_date = new Date((new Date()).getTime() + (1 * 1 * 1 * 10 * 1000));

            interval = $interval(function () {
                var start_date = new Date().getTime();
                var time = getTimeRemaining(new Date(end_date), new Date(start_date));
                countdown.innerHTML = '' +
                    '<span class="col-xs-3 text-center no-padding">' + time.seconds + ' <br><b>Seconds</b></span>' +
                    '<span class="col-xs-3 text-center no-padding">' + time.minutes + ' <br><b>Minutes</b></span>' +
                    '<span class="col-xs-3 text-center no-padding">' + time.hours + ' <br><b>Hours</b></span>' +
                    '<span class="col-xs-3 text-center no-padding">' + time.days + ' <br><b>Days</b></span>';

                if (time.total <= 0) {
                    $scope.stopTimer();
                }
            }, 1000);
        };

        $scope.stopTimer = function () {
            if (angular.isDefined(interval)) {
                $interval.cancel(interval);
                interval = undefined;
            }
            $scope.trial = false;
        };

        $scope.$on('$destroy', function () {
            $scope.stopTimer();
        });

    }]);

function completedLesson(data) {
    var completedLessons = 0;
    var countLessons = 0;
    if (data != undefined) {
        angular.forEach(data, function (value, index) {
            if (value.lessons == undefined) {
                if (value.users != undefined && value.users.length > 0) {
                    completedLessons++;
                }
                countLessons = data.length;
            } else {
                angular.forEach(value.lessons, function (val, index) {
                    if (val.users.length > 0) {
                        completedLessons++;
                    }
                });

                countLessons += value.lessons.length;
            }
        })
    }
    return (completedLessons * 100) / countLessons;
}

function getTimeRemaining(endtime, starttime) {
    var t = Date.parse(endtime) - Date.parse(starttime);
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}