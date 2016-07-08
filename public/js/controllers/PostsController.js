app.controller('PostsController', ['$scope', '$timeout', '$sce', 'PostsFactory', function ($scope, $timeout, $sce, PostsFactory) {

    PostsFactory.getAllPosts().then(function (response) {
        console.log(response)
        $scope.posts = response.data;
        
    }, function (error) {
        console.log(error)
    });

    // $scope.mail.htmlbody = $sce.trustAsHtml(scope.mail.htmlbody);
    // $scope.description = function(description) {
    //     return $sce.trustAsHtml(description);
    // };
    
    $timeout(function () {
        fixBlogHeight();
    },200);


    function fixBlogHeight() {
        $('.blog-post-left').each(function () {
            $(this).next().find('img').height($(this).outerHeight());
        })
    }
    
}]);