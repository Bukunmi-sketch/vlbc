<?php
session_start();


include '../Models/Auth.php';

$authInstance= new Auth($conn);
$password="";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $password=$_POST['password'];
    $sessionid=$_POST['session'];

    if(!empty($password)){
          if($authInstance->authPassword($sessionid, $password)){
               $_SESSION['verify']=true;
               echo "success";
          }else{
              echo "incorrect password";
          }
    }else{
        echo "kindly type your password";
    }




}



?>