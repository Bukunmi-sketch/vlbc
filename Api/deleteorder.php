<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,DELETE");
//header("Content-Type: multipart/form-data; charset=UTF-8");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Headers: Content-Type; Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Models/Order.php';  

$orderInstance= new Order($conn);

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
     
    case 'DELETE':

    $requestOrderId=$_GET['id'];

     if($orderInstance->deleteOrder($requestOrderId)){
        $data=["status"=>200, "message"=>"order deleted succesfully", "orderid"=>$requestOrderId];
     }else{
        $data=["status"=>200, "message"=>"order cannot be deleted, an error occured", "orderid"=>$requestOrderId];
     }
    
     echo json_encode($data);
  
    break;

}

?>