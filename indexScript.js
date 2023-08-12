//making clock
function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session;

    if (hh > 18 && hh <= 23) {
        session = "Good Evening!";
    } else if (hh >= 0 && hh <= 11) {
        session = "Good Morning!";
    } else if (hh >= 12 && hh <= 24) {
        session = "Good Noon!";
    } else {
        session = "Good Afternoon!";
    }
    
    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;
    
    let time = hh + ":" + mm + ":" + ss + " " + session;
    
    document.getElementById("clock").innerHTML = time;
    var t = setTimeout(function(){currentTime()}, 1000);
}
    
currentTime();

function popUp() {
    let popup = document.getElementById('pop-up')
    popup.classList.remove('popup-wrapper')
    popup.classList.add('popup-show')
}

function popDown() {
    let popup = document.getElementById('pop-up')
    popup.classList.remove('popup-show')
    popup.classList.add('popup-wrapper')
}

function popUp2() {
    let popup2 = document.getElementById('pop-up2')
    popup2.classList.remove('popup-wrapper2')
    popup2.classList.add('popup-show')
}

function popDown2() {
    let popup2 = document.getElementById('pop-up2')
    popup2.classList.remove('popup-show')
    popup2.classList.add('popup-wrapper2')
}
