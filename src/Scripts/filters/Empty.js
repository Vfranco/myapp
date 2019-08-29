app.filter('emptyData', function(){
    return function(input)
    {
        if(input == '' || input == null || input == ' ')
            return 'N/A';

        return input;
    }
});