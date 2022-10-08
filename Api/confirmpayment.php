<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
//header("Content-Type: multipart/form-data; charset=UTF-8");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Headers: Content-Type; Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Models/Payment.php';  
include '../Models/Auth.php';  

$paymentInstance= new Payment($conn);
$authInstance= new Auth($conn);

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
    case 'POST':
    $request = json_decode(file_get_contents('php://input'));

    $payment_confirmation=$request->payment_confirmation;
    $transaction_ref=$request->transaction_ref;
    $orderid= $request->order_id;

    
    if( $paymentInstance->confirmPayment($orderid, $payment_confirmation, $transaction_ref) ){
        $data=["status"=>200, "message"=>"payment now confirmed in afrimama server"];
        }else{
         $data=["status"=>500, "message"=>"failed to confirmed payment after verification , error from afrimama server"];
         }
         
         echo json_encode($data);  



    break;
       
     

}
?>