app.filter('ellipsis', function () {
    return function (text, length, slug) {
        if (text.length > length) {
            return text.substr(0, length) + "<a ng-href='/post/" + slug + "' class='cursor: pointer;'>Read More</a>";
        }
        return text;
    }
});