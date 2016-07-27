app.filter('toDate', function () {
    return function (input, searchRegex, replaceRegex) {
        var months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        ];
        if(searchRegex != undefined){
            return ('0' + ((new Date(input)).getDate())).slice(-2) + ' ' + months[parseInt(('0' + ((new Date(input)).getMonth())).slice(-2))] + ' ' + (new Date(input)).getFullYear();
        }else{
            return months[parseInt(('0' + ((new Date(input)).getMonth())).slice(-2))] + ' ' + (new Date(input)).getFullYear();
        }
    }
});