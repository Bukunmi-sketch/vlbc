<?php

include '../Includes/inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

$birthmonth=$authInstance->validate($_POST['birthmonth']);
$userid=$_POST['receiver'];

    if(!empty($birthmonth)){    
            $birthdayInstance->fetchBirthdayCelebrant($birthmonth);
     }else{
       echo "kindly select a month";
     }






}