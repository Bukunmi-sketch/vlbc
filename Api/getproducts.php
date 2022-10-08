<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Models/Product.php';  

$productInstance= new Product($conn);

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {

    case 'GET':
     $stmt=$productInstance->getProducts();
     $productData=$stmt->fetchAll(PDO::FETCH_ASSOC);
     echo json_encode($productData);

    break;

}

?>