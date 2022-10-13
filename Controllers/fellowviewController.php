<?php

include '../Includes/inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

$fellowship=$authInstance->validate($_POST['fellowship']);
$userid=$_POST['receiver'];

    if(!empty($fellowship)){    
            $fellowshipInstance->fetchFellowshipMembers($fellowship);
     }else{
       echo "kindly select a fellowship family";
     }






}