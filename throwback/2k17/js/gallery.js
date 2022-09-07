
var galleryapp =angular.module("gallery",[]);

galleryapp.controller("gallerycont",function($scope){
   
});

var box = document.getElementById('box1');
var img = document.getElementById('pic1');
var box_img = document.getElementById("pic01");
var text = document.getElementById("text");

img.onclick =function(event)
{
	
	box.style.display = "block";
    box_img.src = this.src;
    text.innerHTML = this.alt;
}

var close = document.getElementsByClassName("close")[0];

close.onclick = function() { 
    box.style.display = "none";
}



var box2 = document.getElementById('box2');
var img2 = document.getElementById('pic2');
var box_img2 = document.getElementById("pic02");
var text2 = document.getElementById("text");

img2.onclick =function(event)
{
	
	box2.style.display = "block";
    box_img2.src = this.src;
    text1.innerHTML =this.alt;
}

var close2 = document.getElementsByClassName("close")[1];

close2.onclick = function() { 
    box2.style.display = "none";
}


var box3 = document.getElementById('box3');
var img3 = document.getElementById('pic3');
var box_img3 = document.getElementById("pic03");
var text3 = document.getElementById("text");

img3.onclick =function(event)
{
	
	box3.style.display = "block";
    box_img3.src = this.src;
    text3.innerHTML =this.alt;
}

var close3 = document.getElementsByClassName("close")[2];

close3.onclick = function() { 
    box3.style.display = "none";
}



var box4 = document.getElementById('box4');
var img4 = document.getElementById('pic4');
var box_img4 = document.getElementById("pic04");
var text4 = document.getElementById("text");

img4.onclick =function(event)
{
	
	box4.style.display = "block";
    box_img4.src = this.src;
    text4.innerHTML =this.alt;
}

var close4 = document.getElementsByClassName("close")[3];

close4.onclick = function() { 
    box4.style.display = "none";
}



var box5 = document.getElementById('box5');
var img5 = document.getElementById('pic5');
var box_img5= document.getElementById("pic05");
var text5 = document.getElementById("text");

img5.onclick =function(event)
{
	
	box5.style.display = "block";
    box_img5.src = this.src;
    text5.innerHTML =this.alt;
}

var close5 = document.getElementsByClassName("close")[4];

close5.onclick = function() { 
    box5.style.display = "none";
}


var box6 = document.getElementById('box6');
var img6 = document.getElementById('pic6');
var box_img6 = document.getElementById("pic06");
var text6 = document.getElementById("text");

img6.onclick =function(event)
{
	
	box6.style.display = "block";
    box_img6.src = this.src;
    text6.innerHTML =this.alt;
}

var close6 = document.getElementsByClassName("close")[5];

close6.onclick = function() { 
    box6.style.display = "none";
}


var box7 = document.getElementById('box7');
var img7 = document.getElementById('pic7');
var box_img7 = document.getElementById("pic07");
var text7 = document.getElementById("text");

img7.onclick =function(event)
{
	
	box7.style.display = "block";
    box_img7.src = this.src;
    text7.innerHTML =this.alt;
}

var close7 = document.getElementsByClassName("close")[6];

close7.onclick = function() { 
    box7.style.display = "none";
}

var box8 = document.getElementById('box8');
var img8 = document.getElementById('pic8');
var box_img8 = document.getElementById("pic08");
var text8 = document.getElementById("text");

img8.onclick =function(event)
{
	
	box8.style.display = "block";
    box_img8.src = this.src;
    text8.innerHTML =this.alt;
}

var close8 = document.getElementsByClassName("close")[7];

close8.onclick = function() { 
    box8.style.display = "none";
}
