
var modal = document.getElementById('myModal');

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

 
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal1 = document.getElementById('myModal2');

var btn1 = document.getElementById("myBtn2");

var span1 = document.getElementsByClassName("close")[1];

 
btn1.onclick = function() {
    modal1.style.display = "block";
}

span1.onclick = function() {
    modal1.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}




var modal2 = document.getElementById('myModal3');

var btn2 = document.getElementById("myBtn3");

var span2 = document.getElementsByClassName("close")[2];

 
btn2.onclick = function() {
    modal2.style.display = "block";
}

span2.onclick = function() {
    modal2.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}


var modal3 = document.getElementById('myModal4');

var btn3 = document.getElementById("myBtn4");

var span3 = document.getElementsByClassName("close")[3];

 
btn3.onclick = function() {
    modal2.style.display = "block";
}

span3.onclick = function() {
    modal2.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}