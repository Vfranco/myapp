app.factory('Redirect', ['$location', function ($location) {
    return {
        To  : function (route) {
            return $location.path(route);
        }
    };
}]);