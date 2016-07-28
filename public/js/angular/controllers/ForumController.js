app.controller('ForumController', ['$scope', '$uibModal', '$routeParams', '$location', '$route', 'ForumFactory', 'toastr',
    function ($scope, $uibModal, $routeParams, $location, $route, ForumFactory, toastr) {

        $scope.forum = {
            comment: 'Enter Post Here &nbsp;'
        };

        if ($routeParams.forumId) {
            if ($routeParams.topicId == undefined) {
                ForumFactory.getForumBySlug($routeParams.forumId).then(function (response) {
                    // console.log(response);
                    $scope.forums = response.data.forum_category;
                    $scope.currentForum = response.data.forum_topic;
                    $scope.customPagination(1, 3, $scope.currentForum.forum_topics);

                }, function (error) {
                    errorMessage(error.data);
                    console.log(error);
                });
            } else {

                ForumFactory.getTopicBySlug($routeParams.forumId, $routeParams.topicId).then(function (response) {
                    // console.log(response);
                    $scope.forums = response.data.forum_category;
                    $scope.currentForum = response.data.forum_topic.forum_topics[0];
                    $scope.id = true;
                    $scope.customPagination(1, 3, $scope.currentForum.forum_posts);

                }, function (error) {
                    errorMessage(error.data);
                    console.log(error);
                });
            }
        } else {
            ForumFactory.getForums().then(function (response) {
                // console.log(response);
                $scope.forums = response.data;
                $scope.currentForum = response.data[0];

                $scope.customPagination(1, 3, $scope.currentForum.forum_topics);

            }, function (error) {
                errorMessage(error.data);
                console.log(error);
            });
        }

        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };

        $scope.customPagination = function (shown, size, data) {
            var pagesShown = shown;
            var pageSize = size;

            $scope.paginationLimit = function () {
                return pageSize * pagesShown;
            };

            $scope.hasMoreItemsToShow = function () {
                return pagesShown < (data.length / pageSize);
            };

            $scope.showMoreItems = function () {
                pagesShown = pagesShown + 1;
            };
        };

        // $scope.getForumByID = function (forumID) {
        //     angular.forEach($scope.forums, function (value, index) {
        //         if (value.id == forumID) {
        //             $scope.currentForum = value;
        //             $scope.forumID = forumID;
        //         }
        //     })
        // };

        $scope.online = function (user) {
            return (new Date() - new Date(user)) > 300000 ? false : true;
        };

        $scope.like_topic = function (topicID) {
            ForumFactory.likeTopic(topicID).then(function (response) {
                console.log(response);

                if (response.status == 200 && !response.data.status) {
                    errorMessage(response.data);
                    return false;
                }

                $route.reload();

                console.log(1);

                //$scope.forums = response.data;
                //$scope.currentForum = response.data[0];

                //$scope.customPagination(1, 3, $scope.currentForum.forum_topics);
            }, function (error) {
                errorMessage(error.data);
                console.log(error);
            });
        };

        $scope.like_users = function (topicID) {
            ForumFactory.likeTopicUsers(topicID).then(function (response) {
                // console.log(response)
                $scope.users = response.data;
                $uibModal.open({
                    templateUrl: 'templates/partials/like_users',
                    controller: 'ModalController',
                    scope: $scope
                });
            }, function (error) {
                errorMessage(error.data);
                console.log(error);
            });
        };

        $scope.editorOptions = {
            // width: 500,
            height: 100,
            toolbarCanCollapse: true,
            removeButtons: 'Image,Table,Maximize'
            // language: 'en',
            // uiColor: '#AADC6E'
            // settings more at http://docs.ckeditor.com/#!/guide/dev_configuration
        };

        $scope.display = false;
        $scope.replay = null;

        $scope.isReplyFormOpen = function (value, user) {
            var comment = user ? '<a href="javascript:void(0)">@' + user + '</a>&nbsp;' : 'Enter Post Here &nbsp;';
            $scope.forum = {
                comment: comment
            };
            if (value == undefined) {
                $scope.display = !$scope.display;
                $scope.replay = null;
            } else {
                $scope.display = false;
                if ($scope.replay == value) {
                    $scope.replay = null;
                } else {
                    $scope.replay = value;
                }
            }
        };

        $scope.createPost = function (data, topic) {

            if (topic.id == undefined || topic.slug == undefined) {
                return;
            }

            $scope.replay = null;
            $scope.display = false;

            data['forum_topic_id'] = topic.id;
            data['slug'] = topic.slug;
            // console.log(data);return
            ForumFactory.createPost(data).then(function (response) {
                // console.log(response);
                $scope.forums = response.data.forum_category;
                $scope.currentForum = response.data.forum_topic.forum_topics[0];
                $scope.id = true;
                $scope.customPagination(1, 3, $scope.currentForum.forum_posts);
            }, function (error) {
                errorMessage(error.data);
                console.log(error);
            });
        };

        $scope.replayToTopic = function (forum, data, topic) {
            $scope.createPost(data, topic);
            $location.path('/forum/' + forum.slug + '/' + topic.slug);
        };

        function errorMessage(error) {
            var data = "";
            angular.forEach(error, function (value, key) {
                if(value != false) data += value + "<br/>";
            }, data);

            toastr.error(data, 'Error!');
        }

    }]);