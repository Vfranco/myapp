app.factory('Session', ['$window', function($window){
    var session = {};

    session.checkSession = function()
    {
        var getSession = $window.localStorage.getItem('sessionUser');

        if(getSession == null)
            return true;

        return false;
    }
    return session;
}]);