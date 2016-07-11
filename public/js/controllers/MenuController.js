app.controller('MenuController', ['$scope', '$location', '$routeParams', 'LessonFactory',
    function ($scope, $location, $routeParams, LessonFactory) {

        $scope.isCollapsed = true;

        LessonFactory.getCourses().then(function (response) {
            $scope.courses = response.data;
        }, function (error) {
            console.log(error)
        });

        $scope.goTo = function (lessonId) {
            $location.path('/lesson/' + lessonId);
        };

        $scope.completedLesson = function (lessons) {

            var l_c = 0;
            angular.forEach(lessons, function (value, index) {
                if(value.users.length > 0)
                    l_c += l_c;
            })
            console.log(l_c);
        };

        // $scope.courses = [
        //     {
        //         name: 'Free Laptop Startup Package',
        //         image: '/images/profile-img.png',
        //         author: 'By Sam Baker',
        //         lessons: [
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             }
        //         ]
        //     },
        //     {
        //         name: 'Free Laptop Startup Package',
        //         author: 'By Sam Baker',
        //         lessons: [
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             },
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             },
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             },
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             }
        //         ]
        //     },
        //     {
        //         name: 'Free Laptop Startup Package',
        //         image: '/images/profile-img.png',
        //         author: 'By Sam Baker',
        //         lessons: [
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             }
        //         ]
        //     },
        //     {
        //         name: 'Free Laptop Startup Package',
        //         author: 'By Sam Baker',
        //         lessons: [
        //             {
        //                 duration: '25',
        //                 title: 'Introduction',
        //                 description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
        //             }
        //         ]
        //     }
        // ];

    }]);