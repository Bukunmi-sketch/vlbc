<?php

include '../Includes/inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

$ministry=$authInstance->validate($_POST['ministry']);
$userid=$_POST['receiver'];

    if(!empty($ministry)){
       // if($unitInstance->fetchUnitMembers($ministry)){
            $unitInstance->fetchUnitMembers($ministry);
       // }else{ 
        //    echo 'an error occured while fetching';
       // }
     }else{
       echo "kindly select an item";
     }






}