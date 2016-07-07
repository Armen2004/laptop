app.controller('MenuController', ['$scope', function ($scope) {

    $scope.isCollapsed = true;

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