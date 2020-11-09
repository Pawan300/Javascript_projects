window.onload = function(){

    var minutes = 0;
    var seconds = 0;

    var start = document.getElementById("start");
    var stop = document.getElementById("stop");
    var reset = document.getElementById("reset");

    var seconds_tag = document.getElementById("seconds");
    var minutes_tag = document.getElementById("minutes");

    reset.onclick = function(){
        clearInterval(Interval);
        minutes = 0;
        seconds = 0;
        seconds_tag.innerText = "00";
        minutes_tag.innerText = "00"; 
    }

    stop.onclick = function(){
        clearInterval(Interval);        
    }

    start.onclick = function(){

        Interval = setInterval(timer, 10);
    }

    function timer(){

        seconds ++;

        if(seconds <=9){
            seconds_tag.innerText = "0" + seconds;
        }
        if(seconds > 9){
            seconds_tag.innerText = seconds;
        }

        if(seconds > 99){
            minutes ++;
            seconds = 0;
            if (minutes <= 9){
                minutes_tag.innerText = "0"+minutes;
            }
            if (minutes >9){
                minutes_tag.innerText = minutes;
            }

        }
    }

}