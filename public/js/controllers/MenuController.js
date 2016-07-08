app.controller('MenuController', ['$scope', '$location', 'MenuFactory', function ($scope, $location, MenuFactory) {

    $scope.isCollapsed = true;

    MenuFactory.getCourses().then(function (response) {
        $scope.courses = response.data;
        console.log(response)
    }, function (error) {
        console.log(error)
    });

    $scope.goTo = function (lessonId) {
        $location.path('/lesson/' + lessonId);
    };

    $scope.courses = [
        {
            name: 'Free Laptop Startup Package',
            image: '/images/profile-img.png',
            author: 'By Sam Baker',
            lessons: [
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                }
            ]
        },
        {
            name: 'Free Laptop Startup Package',
            author: 'By Sam Baker',
            lessons: [
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                },
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                },
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                },
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                }
            ]
        },
        {
            name: 'Free Laptop Startup Package',
            image: '/images/profile-img.png',
            author: 'By Sam Baker',
            lessons: [
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                }
            ]
        },
        {
            name: 'Free Laptop Startup Package',
            author: 'By Sam Baker',
            lessons: [
                {
                    duration: '25',
                    title: 'Introduction',
                    description: 'For anyone who wants to set up a website to make extra incomebut doesn\'t'
                }
            ]
        }
    ];

}]);