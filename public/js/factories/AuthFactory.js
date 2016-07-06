app.factory('AuthFactory', ['$http', '$q', '$sanitize', 'BASE_URL', function ($http, $q, $sanitize, BASE_URL) {

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
                    console.log(data, status, headers);
                    deferred.resolve(data);
                })
                .error(function (data, status, headers, config, statusText) {
                    console.log('Request Failed!', data, status, headers, config, statusText);
                    deferred.reject({data: data, status: status});
                });
            return deferred.promise;
        },

        doLogin: function (user) {
            var userData = {
                email: $sanitize(user.email),
                password: $sanitize(user.password),
                _token: $sanitize(user._token)
            };
            return this.sendRequest('POST', BASE_URL + 'login', userData);
        },

        doRegister: function (user) {
            console.log(user);
        }
    };
}]);

//HAYPOST - SARYAN 22 16:30 6 - 605