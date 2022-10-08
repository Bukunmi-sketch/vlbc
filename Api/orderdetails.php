<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Models/Order.php';  

$orderInstance= new Order($conn);

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
     
    case 'GET':

    $requestOrderId=$_GET['id'];

     $stmt=$orderInstance->getOrdersById($requestOrderId);
     $productData=$stmt->fetch(PDO::FETCH_ASSOC);
     echo json_encode($productData);
   /* 
   $data=["status"=>200, "message"=>"order details available", "orderid"=>$requestOrderId];
   echo json_encode($data); */
    break;

}

?>