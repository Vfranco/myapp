app.filter('setColorSigga', function(){
    return function(value)
    {
        if(value == 'Mi Personal')
            return 'info';
            
        if(value == 'Mis Visitantes')
            return 'primary';

        if(value == 'Mis Contratistas')
            return 'warning';
    }
});