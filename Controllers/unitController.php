<?php

include '../Models/Unit.php';
include '../Models/Auth.php';


$unitInstance=new Unit($conn);
$authInstance=new Auth($conn);

$unit_name="";
$creator="";
$date="";


if($_SERVER['REQUEST_METHOD']=="POST"){


    $unit_name=$authInstance->validate($_POST['unit_name']);
    $creator=$_POST['creator_name'];
    $date=date("y-m-d h:ia");
    $creator_id=$_POST['creator_id'];
 

    if(!empty($unit_name)){
        if($unitInstance->IfUnitExisted($unit_name)){ 
                if($unitInstance->createUnit($unit_name, $creator, $date) ){
                    echo "success";
                }else{
                    echo "an error occurred while adding a Unit";
                }    
        }else{
            echo "unit name has already been added";
        }   
     }else{
       echo 'unit name cannot be empty';
     }






}



?>