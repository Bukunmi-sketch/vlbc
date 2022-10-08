<?php
include '../Models/Order.php';  

$orderid=$_POST["orderid"];
$orderInstance= new Order($conn);      



if($_SERVER['REQUEST_METHOD']=="POST"){

    if($orderInstance->markDelivered($orderid)){
      echo "success";
    }else{
        echo "cant mark this order ";
            }



}


?>