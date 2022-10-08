<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Headers: Content-Type; Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Models/Order.php';  
include '../Models/Auth.php';  

$orderInstance= new Order($conn);
$authInstance= new Auth($conn);

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {

    case 'POST':
     $request = json_decode(file_get_contents('php://input'));
      
               $orderId= 2+rand(0,time());
               $cartitems=$request->product;
               $amount=$authInstance->validate($request->amount);
               $customersFirstname=$authInstance->validate( $request->firstname);
               $customersLastname=$authInstance->validate( $request->lastname);
               $customersEmail=$authInstance->validate( $request->email);
               $customersPhone=$authInstance->validate($request->phone);
               $customersLocal=$authInstance->validate($request->lga);
               $customersState=$authInstance->validate( $request->state);
               $customersAddress=$authInstance->validate( $request->address);
               $customersInfo=$authInstance->validate( $request->moreInfo);
               $paymentStatus=$request->payment_status;
               $orderStatus=$request->order_status;
               $date=date("y:m:d h:i:sa");
               $status="unread";

        if( $orderInstance->createOrder($orderId, $customersFirstname, $customersLastname, $customersEmail, $customersLocal, $customersAddress, $customersState, $cartitems, $customersPhone, $customersInfo, $paymentStatus, $orderStatus, $amount, $status, $date) ){
                $data=["customername"=>$customersFirstname,"customeremail"=>$customersEmail, "orderid"=> $orderId, "phone"=> $customersPhone, "date"=>$date];
        }else{
         $data=["status"=>500, "message"=>"failed to create order , error from afrimama server"];
         }
         
         echo json_encode($data);  
           break;
   
       
     

}

?>