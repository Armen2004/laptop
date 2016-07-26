app.filter('toMinSec', function(){
    return function(input){

        var minutes = parseInt(input/60);
        var seconds = input%60;

        if (minutes < 10){
            minutes = "0" + minutes
        }

        if (seconds < 10){
            seconds = "0" + seconds
        }

        return minutes + (seconds ? ':' + seconds : '');
    }
});