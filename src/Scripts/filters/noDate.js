app.filter('notDateRegister', function(){
    return function(input)
    {
        if(input == '0000-00-00 00:00:00')
            return 'no registra salida';

        return input;
    }
});