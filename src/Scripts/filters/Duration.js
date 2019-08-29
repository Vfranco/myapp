app.filter('getTimeElapsed', function(){
    return function(start, finish)
    {
        if(finish == '0000-00-00 00:00:00')
            return 'No registra Salida';
        else
        {
            var startDate = moment(new Date(start));
            var endDate = moment(new Date(finish));

            var duration = moment.duration(endDate.diff(startDate));
            var hours = duration.asMinutes()

            var timeElapsed = parseInt(duration.asDays()) + 'd ' + (parseInt(duration.asHours())) + 'h ' + (parseInt(duration.asMinutes() / 60)) + 'm ' + (parseInt(duration.asSeconds() / 60 / 60)) + 's';

            return timeElapsed;
        }        
    }
});