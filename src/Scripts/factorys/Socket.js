app.factory('Socket', ['$rootScope', function ($rootScope) {

    var server = 'http://nodejs.sigga.com.co/';
    //var server = 'http://localhost:3000/';
    var socket = io.connect(server);

    return {
        on: function (eventName, callback)
        {
            socket.on(eventName, function ()
            {
                var args = arguments;

                $rootScope.$apply(function(){
                    callback.apply(socket, args);
                });                
            });
        },
        emit: function (eventName, data, callback)
        {
            socket.emit(eventName, data, function () {

                var args = arguments;

                $rootScope.$apply(function () {
                    if (callback)
                        callback.apply(socket, args);                    
                });
            });
        }
    }
}]);