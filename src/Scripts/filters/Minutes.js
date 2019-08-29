app.filter('getMinutes', function(){
    return function(time)
    {
        var startDate = new Date(time);
        var endDate = new Date();
        var milliSeconds = endDate - startDate;

        return Math.floor(milliSeconds/(1000*60*60)).toLocaleString(undefined, {minimumIntegerDigits : 2}) + "h " + (Math.floor(milliSeconds/(1000*60))%60).toLocaleString(undefined, {minimumIntegerDigits: 2}) + "m " + (Math.floor(milliSeconds/1000)%60).toLocaleString(undefined, {minimumIntegerDigits: 2}) + "s";
    }
});