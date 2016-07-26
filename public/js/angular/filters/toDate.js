app.filter('toDate', function () {
    return function (input) {

        var months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        ];
        return months[parseInt(('0' + ((new Date(input)).getMonth() + 1)).slice(-2))] + ' ' + (new Date(input)).getFullYear();
    }
});