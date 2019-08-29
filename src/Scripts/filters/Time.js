app.filter('timeElapsed', function(){
    return function(input)
    {
        return timeElapsed = Math.floor(input / 60);
    }
});