/*const bars=document.querySelector(".bars");
const ul=document.querySelector("header ul");
bars.onclick=()=>{
     ul.style.left="-100%"
}
/*
function toggleit(menu){
    menu.classList.toggle('show');
}

*/

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