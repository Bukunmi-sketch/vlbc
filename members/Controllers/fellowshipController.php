<?php

include '../Models/Fellowship.php';
include '../Models/Auth.php';


$fellowshipInstance=new Fellowship($conn);
$authInstance=new Auth($conn);

$fellowshipname="";
$creator="";
$date="";


if($_SERVER['REQUEST_METHOD']=="POST"){


    $fellowshipname=$authInstance->validate($_POST['fellowshipname']);
    $creator=$_POST['creator_name'];
    $date=date("y-m-d h:ia");
    $creator_id=$_POST['creator_id'];
 

    if(!empty($fellowshipname)){
        if($fellowshipInstance->IfFellowshipExisted($fellowshipname)){ 
                if($fellowshipInstance->createFellowship($fellowshipname, $creator, $date) ){
                    echo "success";
                }else{
                    echo "an error occurred while adding this fellowships group";
                }    
        }else{
            echo "fellowship name has already been added";
        }   
     }else{
       echo 'fellowship name cannot be empty';
     }






}



?>