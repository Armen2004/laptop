app.factory('PostsFactory', ['$http', '$q', '$sanitize', 'BASE_URL', function ($http, $q, $sanitize, BASE_URL) {

    return {

        sendRequest: function (method, urlPath, params) {
            var deferred = $q.defer();
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
       
        getAllPosts: function () {
            return this.sendRequest('POST', BASE_URL + 'getAllPosts');
        },
        
        getPostBySlug: function (slug) {
            var postSlug = {
                slug: $sanitize(slug)
            };
            return this.sendRequest('POST', BASE_URL + 'getPost', postSlug);
        },

        getNextPost: function (id) {
            var postID = {
                id: $sanitize(id)
            };
            return this.sendRequest('POST', BASE_URL + 'getNextPost', postID);
        },

        getPreviousPost: function (id) {
            var postID = {
                id: $sanitize(id)
            };
            return this.sendRequest('POST', BASE_URL + 'getPreviousPost', postID);
        }
    };
}]);