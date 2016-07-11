app.factory('LessonFactory', ['$rootScope', '$http', '$q', '$sanitize', 'AuthFactory', 'BASE_URL',
    function ($rootScope, $http, $q, $sanitize, AuthFactory, BASE_URL) {

        return {

            sendRequest: function (method, urlPath, params) {
                var deferred = $q.defer();
                //var completeUrl;
                // if (params) {
                //     params = $.param(params)
                // }
                $http({
                    method: method,
                    url: urlPath,
                    data: params
                })
                    .success(function (data, status, headers) {
                        // console.log(data, status, headers);
                        deferred.resolve({data: data, status: status});
                    })
                    .error(function (data, status, headers, config, statusText) {
                        // console.log('Request Failed!', data, status, headers, config, statusText);
                        deferred.reject({data: data, status: status});
                    });
                return deferred.promise;
            },

            getCourses: function () {
                var _self = this;
                return AuthFactory.checkUser().then(function (response) {
                    var courseData = {
                        user_type: $sanitize(response.data.userInfo.user_type_id)
                    };
                    return _self.sendRequest('POST', BASE_URL + 'getCourses', courseData);
                });
            },

            getLesson: function (slug) {
                var lessonData = {
                    slug: $sanitize(slug)
                };
                return this.sendRequest('POST', BASE_URL + 'getLesson', lessonData);
            },

            completeLesson: function (lessonID) {
                var lessonData = {
                    id: $sanitize(lessonID)
                };
                return this.sendRequest('POST', BASE_URL + 'completeLesson', lessonData);
            }
        };
    }]);