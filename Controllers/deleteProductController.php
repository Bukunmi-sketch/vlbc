<?php

$productid=$_POST["productid"];

include '../Models/Product.php';  

$productInstance= new Product($conn);      



if($_SERVER['REQUEST_METHOD']=="POST"){

    if($productInstance->deleteProduct($productid)){
        $productInstance->deleteProduct($productid);
    }else{
        echo "cant delete this product ";
            }



}


?>