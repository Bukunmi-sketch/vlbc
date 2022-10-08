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

    $payment_status=$request->payment_status;
    $order_status= $request->order_status;
    $payment_type=$request->payment_type;
    $orderid= $request->order_id;
    $notifynewpay=$request->notifynewpay;

    
    if( $paymentInstance->updatePayment($orderid, $payment_status, $payment_type, $order_status, $notifynewpay) ){
        $data=["status"=>200, "message"=>"payment record updated successfully in afrimama server"];
        }else{
         $data=["status"=>500, "message"=>"failed to update order , error from afrimama server"];
         }
         
         echo json_encode($data);  



    break;
       
     

}
?>