app.filter('timeAgo', function(){
    return function(input)
    {
        var day = moment(input);
        return day.startOf('hour').fromNow();
    }
});