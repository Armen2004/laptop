app.controller('PostsController', ['$scope', '$timeout', '$routeParams', '$location', 'PostsFactory',
    function ($scope, $timeout, $routeParams, $location, PostsFactory) {

        if ($routeParams.postId) {
            PostsFactory.getPostBySlug($routeParams.postId).then(function (response) {
                $scope.post = response.data;

            }, function (error) {
                console.log(error)
            });
        } else {
            PostsFactory.getAllPosts().then(function (response) {
                $scope.posts = response.data;

                var pagesShown = 1;
                var pageSize = 5;

                $scope.paginationLimit = function(data) {
                    return pageSize * pagesShown;
                };
                $scope.hasMoreItemsToShow = function() {
                    return pagesShown < ($scope.posts.length / pageSize);
                };
                $scope.showMoreItems = function() {
                    pagesShown = pagesShown + 1;
                };

            }, function (error) {
                console.log(error)
            });
        }

        $scope.nextPost = function (postID) {
            PostsFactory.getNextPost(postID).then(function (response) {
                if (response.data.slug != undefined)
                    $location.path('/post/' + response.data.slug);

            }, function (error) {
                console.log(error)
            });
        };

        $scope.previousPost = function (postID) {
            PostsFactory.getPreviousPost(postID).then(function (response) {
                if (response.data.slug != undefined)
                    $location.path('/post/' + response.data.slug);
            }, function (error) {
                console.log(error)
            });
        };

        $timeout(function () {
            fixBlogHeight();
        }, 200);


        function fixBlogHeight() {
            $('.blog-post-left').each(function () {
                $(this).next().find('img').height($(this).outerHeight());
            })
        }

    }]);