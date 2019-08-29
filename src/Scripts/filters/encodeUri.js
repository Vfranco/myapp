app.filter('encodeUri', function(){
    return function(input)
    {
        return window.encodeURIComponent(input);
    }
});