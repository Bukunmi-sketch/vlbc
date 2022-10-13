<?php

include '../Models/Member.php';
include '../Models/Uploadimg.php';
include '../Models/Auth.php';

//$loginInstance= new Login($conn);  
$imgInstance= new Uploadimg($conn);
$memberInstance = new User\Member($conn);
$authInstance=new Auth($conn);

$firstname="";
$lastname="";
$email="";
$mobile="";
$available="";
$date="";
$picture="";

if($_SERVER['REQUEST_METHOD']=="POST"){


    $firstname=$authInstance->validate($_POST['fname']);
    $lastname=$authInstance->validate($_POST['lname']);
    $rollid=$_POST["rollid"];
    $email=$authInstance->validate($_POST['email']);
    $mobile=$authInstance->validate($_POST['mobile']);
    $gender=$authInstance->validate($_POST['gender']);
    $residence=$authInstance->validate($_POST['residence']);
    $prev_church=$authInstance->validate($_POST['prev_church']);
    $state_origin=$authInstance->validate($_POST['state_origin']);
    $ministry=$authInstance->validate($_POST['ministry']);
    $fellowship=$authInstance->validate($_POST['fellowship']);
    $marital=$authInstance->validate($_POST['marital']);
    $department=$authInstance->validate($_POST['department']);
    $birthmonth=$authInstance->validate($_POST['birthmonth']);
    $birthday=$authInstance->validate($_POST['birthdate']);
    $date=date("y-m-d h:ia");
    $admin_id=$_POST['admin'];

    $picture=$_FILES['product_image']["name"];
    $dpsize=$_FILES['product_image']['size'];
    $dptemp=$_FILES['product_image']['tmp_name']; 
    $dir="../images/member-img/";
    $dirfile=$dir.basename($picture);
    

    if(!empty($firstname) && !empty($lastname) && !empty($rollid) && !empty($ministry) && !empty($mobile) && !empty($prev_church) && !empty($gender) && !empty($residence) && !empty($birthday) && !empty($state_origin) && !empty($picture) ){
        if($memberInstance->IfMemberExisted($firstname, $lastname, $mobile)){ 
            if($memberInstance->checkEmail($email)){
                if($memberInstance->checkMemberid($rollid)){
                   if($imgInstance->imgextension($picture)){
                     if($imgInstance->largeImage($dpsize)){
                         if($imgInstance->moveImage($dptemp, $dirfile)){
                             if(  $memberInstance->createMembers($admin_id, $picture, $firstname, $lastname, $rollid, $email, $mobile, $gender, 
                             $marital, $fellowship, $residence, $prev_church, $state_origin, $ministry, $department, $birthday, $birthmonth, $date) ){
                            
                                echo "success";
                            }else{
                                echo "an error occurred while uploading the image";
                            }
                         }else{
                             echo "file failed to move";
                         }
                     }else{
                         echo "image is too large";
                     }     
              }else{
                 echo 'file is not an image';
              }
            }else{
                echo 'this member belongs to another member,refresh page';
            }
            }else{
                echo "oops, this email has been used by another member";
            }  
        }else{
            echo "this member has been registered already";
        }   
     }elseif( !empty($firstname) && !empty($lastname) && !empty($rollid) && !empty($ministry) && !empty($mobile)  && !empty($prev_church) && !empty($gender) && !empty($residence) && !empty($birthday) && !empty($state_origin)  && empty($picture) ){
         $picture="null.png";
        if($memberInstance->IfMemberExisted($firstname, $lastname, $mobile)){ 
            if($memberInstance->checkEmail($email)){      
                if($memberInstance->checkMemberid($rollid)){
                      if(  $memberInstance->createMembers($admin_id, $picture, $firstname, $lastname, $rollid, $email, $mobile, $gender, 
                      $marital, $fellowship, $residence, $prev_church, $state_origin, $ministry, $department, $birthday, $birthmonth, $date) ){
                     
                         echo "success";
                     }else{
                         echo "an error occurred while uploading the image";
                     }
            }else{
                echo 'this member belongs to another member,refresh page';
            }         
            }else{
                echo "oops, this email has been used by another member";
            }         
 }else{
     echo "this member has been registered already";
 }   

     }else{
       echo 'important details of members must be totally filled';
     }






}



?>