<?php


  include '../Models/Auth.php';  
  include '../Models/User.php';  
  include '../Models/Login.php';  

 

    // create of object of the user class
  $authInstance= new Auth($conn);
  $userInstance= new User($conn);
  $loginInstance= new Login($conn);
  


//check if user is logged in+


$firstname="";
$lastname="";
$memberid="";


if($_SERVER['REQUEST_METHOD']=="POST"){
       
       $firstname=$authInstance->validate($_POST['firstname']);
       $lastname=$_POST['lastname'];
       $memberid=$_POST['memberid']; 
      
       if(empty($firstname) || empty($lastname) || empty($memberid) ){
            echo "please fill in login details completely";  
       }else{
           //check if the user may be logged in
           if($logindata=$loginInstance->login($firstname, $lastname, $memberid)){
               session_start();
               //$authInstance->redirect('main.php');               
               $_SESSION['id']=$logindata['id'];
               $_SESSION['email']=$logindata['email'];
               $_SESSION['firstname']=$logindata['firstname'];
               $_SESSION['lastname']=$logindata['lastname'];
               $_SESSION["lastactivity"]=time();  
               $_SESSION['loggedin']=true; 
               $_SESSION['lastactivetime']=date("h:ia");; 
               $_SESSION['lastactivedate']=date("y-m-d");  
               $_SESSION['datelastactivity']=date('y-m-d h:i:s');   
               $ipaddress=$_SERVER['REMOTE_ADDR'];
               $browsertype=$_SERVER['HTTP_USER_AGENT'];
             
           //       $loginInstance->usersLogData($_SESSION["id"],$ipaddress, $browsertype);  

                     echo "success";
            }else{
               echo "incorrect credentials";
             }
       }  //empty email and password
 }  //isset login




 ?>