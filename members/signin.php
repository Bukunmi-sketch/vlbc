<?php 
session_start();
//include("../Controllers/logincontroller.php"); 

include './Models/Auth.php';  
include './Models/User.php';  
include './Models/Login.php';  
   


  // create of object of the user class
$authInstance= new Auth($conn);
$userInstance= new User($conn);
$loginInstance= new Login($conn);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
     $authInstance->redirect('./Views/home.php');
}        

?> 
        <!DOCTYPE html>
        <html>
        <head>
        <title>Sign in to Vlbc portal</title>

        <?php include '../Includes/metatags.php' ; ?>
        
        <link rel="stylesheet" href="./Resources/css/login.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="./Resources/css/loader.css">
      
        </head>
        
        <body id="body" onload="load()">
  <div id="lds-facebook">
    <div></div>
    <div></div>
    <div></div>
</div>
      <main>
        <div class="container">
        
        <div class="sub-container">
        
        <div class="logobox">
            <p class="logoo">Member Login Portal</p>
        </div>
        
        <div class="login-details">
          <form action="#">
             <div class="error"><p></p></div><br>
                
                <div class="input-details">
                     <label for="Firstname">Firstname</label>
                     <input type="text" name="firstname" placeholder="Firstname" autofocus required>
                </div>

                <div class="input-details">
                     <label for="Lastname">Lastname</label>
                     <input type="text" name="lastname" placeholder="Lastname" autofocus required>
                </div>
                
                <div class="input-details">
                <label for="Lastname">MemberID</label>
                    <span  id="show" onclick="check()"> <i class="fa fa-eye"></i> </span>
                    <input type="text" id="pass" name="memberid" placeholder="MemberID"     required autocomplete="off">
                </div>
                
                <div class="input-details">
                <button class="submit" name="login">Log In</button>
               </div>
        
            </form>  
         </div>
         
        </div>
        </div>
      </main> 
        
        
        <script src="./Resources/js/loader.js"></script> 
        
        
  <script type="text/javascript">
      
     
  function check(){
           var d=document.getElementById("pass");
           var eye=document.getElementById("show");
            
            
           if(d.type==="password"){
                           d.type="text";
                           eye.innerHTML='<i class="fa fa-eye-slash"></i>';
                                     }
           else{
                d.type="password";
               eye.innerHTML='<i class="fa fa-eye"></i>';
                 }
      }
      
      
 
      
      //const form=document.querySelector("");
      
      const form=document.querySelector("form");
      const btn=document.querySelector("button");
      const error=document.querySelector(".error");
      
      form.onsubmit=(e)=>{
      e.preventDefault();
      }
      
      btn.onclick=()=>{
        
      let xhr="";
          if(window.XMLHttpRequest){
             xhr=new XMLHttpRequest();
                }
           else{
                 xhr=new ActiveXObject("Microsoft.XMLHTTP");
               }
        xhr.onreadystatechange=()=>{
          if(xhr.readyState===XMLHttpRequest.DONE){
               if(xhr.status===200){
        
      	      	let data=xhr.responseText;
      	     	if(data == "success"){
      				location.href="./Views/home.php";
       
     	       	 }
         	 	else{
            	 error.textContent=data;
                 error.style.display="block";
                 btn.innerHTML="Login again";
                 btn.style.fontSize="15px";
          		}
         	  }    //STATUS ===200
           }
       else{
          btn.innerHTML='<i class="fa fa-spinner fa-pulse"></i>';
           btn.style.color="white";
          btn.style.fontSize="1.2em";
          
              }//DONE
      }
      
      xhr.open("POST","./Controllers/logincontroller.php",true);
      let formdata=new FormData(form);
      xhr.send(formdata);     
    }
      
      
      
      
  </script>
  
  </body>
  
 
  </html>