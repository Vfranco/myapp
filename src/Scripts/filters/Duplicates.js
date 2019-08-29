app.filter('avoidDuplicate', function(){
    return function(input)
    {
        var filtered = [];

        input.filter(function(item, index){
            
            if(input.indexOf(item) == index)
                filtered.push(item);
        });

        return filtered;
    }
});