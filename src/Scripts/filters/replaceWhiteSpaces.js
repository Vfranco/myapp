app.filter('replaceWhiteSpaces', function(){
    return function(input, stringReplace)
    {
        return input.replace(/\s+/g, stringReplace);
    }
});