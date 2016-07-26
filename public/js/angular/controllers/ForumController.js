app.controller('ForumController', ['$scope', '$uibModal', '$routeParams', 'ForumFactory',
    function ($scope, $uibModal, $routeParams, ForumFactory) {

        $scope.forum = {
            comment: 'Enter Post Here'
        };

        if ($routeParams.forumId) {
            ForumFactory.getForumBySlug($routeParams.forumId).then(function (response) {
                console.log(response);
                $scope.forums = response.data.forum_category;
                $scope.currentForum = response.data.forum_topic;
                $scope.id = $scope.currentForum.id;
            }, function (error) {
                console.log(error);
            });
        } else {
            ForumFactory.getForums().then(function (response) {
                console.log(response);
                $scope.forums = response.data;
                $scope.currentForum = response.data[0];
            }, function (error) {
                console.log(error);
            });
        }

        $scope.getForumByID = function (forumID) {
            angular.forEach($scope.forums, function (value, index) {
                if (value.id == forumID) {
                    $scope.currentForum = value;
                    $scope.forumID = forumID;
                }
            })
        };

        $scope.online = function (user) {
            return (new Date() - new Date(user)) > 300000 ? false : true;
        };

        $scope.like_topic = function (topicID) {
            ForumFactory.likeTopic(topicID).then(function (response) {
                $scope.like_user = response.data;
                console.log($scope.like_user)
            }, function (error) {
                console.log(error);
            });
        };

        $scope.like_users = function (topicID) {
            ForumFactory.likeTopicUsers(topicID).then(function (response) {
                $scope.forums = response.data;
                $uibModal.open({
                    templateUrl: 'templates/partials/like_users',
                    controller: 'ModalController',
                    scope: $scope
                });
            }, function (error) {
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

        $scope.isReplyFormOpen = function (value) {
            $scope.forum = {
                comment: 'Enter Post Here'
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

        $scope.createPost = function (data, topic, parent) {

            if (topic.id == undefined || topic.slug == undefined) {
                return;
            }

            $scope.replay = null;
            $scope.display = false;


            if (parent != undefined) {
                data['parent_id'] = parent;
            }

            data['forum_topic_id'] = topic.id;
            data['slug'] = topic.slug;

            ForumFactory.createPost(data).then(function (response) {
                console.log(response)
                $scope.forums = response.data.forum_category;
                $scope.currentForum = response.data.forum_topic;
            }, function (error) {
                console.log(error);
            });
        }

    }]);