<?php
include '../Models/Order.php';  
$orderInstance= new Order($conn);      

$orderid=$_POST["orderid"];




if($_SERVER['REQUEST_METHOD']=="POST"){

    if($orderInstance->deleteOrder($orderid)){
        $orderInstance->deleteOrder($orderid);
    }else{
        echo "cant delete this order ";
            }



}


?>