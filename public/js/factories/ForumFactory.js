app.factory('ForumFactory', ['$http', '$q', '$sanitize', 'BASE_URL',
    function ($http, $q, $sanitize, BASE_URL) {

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

            getForums: function () {
                return this.sendRequest('POST', BASE_URL + 'getForums');
            }

            
        };
    }]);