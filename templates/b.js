

function signup(){
    alert ("Sorry! website still under construction, \r\n \r\n You will get updated when it is done,\r\n keep a tab on my social media handles, \r\n \r\n © OLARINDE BUKUNMI 2022");
  }
  
  function dimmode(){
     alert("Oops! darkmode unavailable at the moment");
     }
     


let barButton=document.querySelector('.bars');
let headerUl=document.querySelector('header ul');
let closebar=document.querySelector(".closebar");

barButton.onclick=()=>{
    headerUl.style.left="0";
    closebar.style.display="block";
    barButton.style.display="none";
}

closebar.onclick=()=>{
    headerUl.style.left="-100%";
    closebar.style.display="none";
    barButton.style.display="block";
}

let firstpage=document.querySelector("section.welcome");
let secondpage=document.querySelector(".seecard");
let seemore=document.querySelector(".see-more");
let homebutton=document.querySelector(".homelink");

seemore.onclick=()=>{
    firstpage.style.display="none";
    secondpage.style.display="block";
}

homebutton.onclick=()=>{
    firstpage.style.display="block";
    secondpage.style.display="none";
}



function load(){
    setInterval(rotate,3500); 

    var i=0;
var txt="Fullstack web developer & Software Engineer";
var text=document.getElementById("about");

function type(){
if(i<txt.length){
text.innerHTML+=txt.charAt(i); i++;
}
setInterval(type,2000);     
}
type();
             }

function rotate(){
    document.getElementById("loader").style.display="none";
    document.querySelector(".container-holder").style.display="block";

//setInterval(rotate,5000);
}






 /*		
//original
var slideIndex = 1;
showSlides(slideIndex); 

function plusSlides_(n) {
showSlides(slideIndex+= n);      
}
/*
slideindex=1  (first)
slideindex=slideindex+n;
slideindex=1+1=2;   (second)
slideindex=2+1=3;   (third)

slideindex=3+1=4;    ->slideindex=1  (first)

slideindex=-1+1=0;   ->slideindex=3   (third)

function currentSlide(n) { 
showSlides(slideIndex = n);
}
// slideindex=n

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}  //if n=4 ? slideindex=1 :  
if (n < 1) {slideIndex = slides.length} ; //if n=0 ? slideindex=3

for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";  //(0,1,2)all will be none here
}

for (i = 0; i < dots.length; i++) {
dots[i].classList.remove("active");
}

slides[slideIndex-1].style.display = "block"; //1-1 =0, 2-1=1, 3-1=2
dots[slideIndex-1].classList.add("active");
}
*/


