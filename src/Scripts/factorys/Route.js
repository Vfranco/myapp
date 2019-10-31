app.factory('Route', ['$http', function($http){
    var route = {};

    route.post = function(route, payload)
    {
        return $http.post(baseurl + route, payload);
    }

    return route;
}]);