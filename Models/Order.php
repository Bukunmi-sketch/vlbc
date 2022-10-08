<?php

//namespace Users;

require '../Includes/db.inc.php';
 // session_start();

   class Order{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new products
        public function createOrder($order_id, $customers_firstname, $customers_lastname, $email, $customers_lga, $customers_address , $state , $cart_items , $phone_no,  $additional_info,   $payment_status, $order_status, $amount, $status, $created_at){  
               try{
                
                   $sql="INSERT INTO orders(order_id, customers_firstname, customers_lastname, email ,customers_lga, customers_address , state ,cart_items ,    phone_no,   additional_info,    payment_status, order_status, amount, notify_status, created_at )  VALUES  (:order_id, :customers_firstname, :customers_lastname, :email, :customers_lga, :customers_address, :state, :cart_items ,  :phone_no,  :additional_info,   :payment_status, :order_status, :amount, :status, :created_at  )";
                     $stmt= $this->db->prepare($sql);
                     $result=  $stmt->execute([
                        ":order_id"=>$order_id,
                        ":customers_firstname" => $customers_firstname,
                        ":customers_lastname" => $customers_lastname,
                        ":email" => $email,
                        ":customers_lga" => $customers_lga,
                        ":customers_address" => $customers_address , 
                        ":state" =>$state,
                        ":cart_items"=>$cart_items  ,   
                        ":phone_no" => $phone_no,   
                        ":additional_info"=>    $additional_info,
                        ":payment_status"=>     $payment_status,
                        ":order_status"=> $order_status,
                        ":amount"=>$amount,
                        ":status"=>$status,
                        ":created_at" => $created_at
                   ]);
   
                   if($result){
                    return true;
                       }else{
                  return false;
                   }
               } catch(PDOException $e){
                echo $e->getMessage();
               }
           }   //create()



           public function getOrders()
           {             
             $sql="SELECT * FROM orders";
             $stmt=$this->db->prepare($sql);
             $stmt->execute();
             return $stmt;
           }

           public function deleteOrder($orderid){
            try{
                $sqldelete='DELETE FROM orders WHERE order_id=:orderid';
                $stmt=$this->db->prepare($sqldelete);
                $stmt->bindParam(":orderid", $orderid);
                if($stmt->execute()){
                  return true;
                }else{
                  return false;
                }
              }catch(PDOException $e){
                echo $e->getMessage();
              }   

           }

           public function getOrdersById($orderid){
            try{
                $sql="SELECT * FROM orders WHERE order_id=:orderid";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":orderid", $orderid);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
              echo $e->getMessage();
            }
           }

          public function markDelivered($orderid)
          {
            $query="UPDATE orders SET order_status='delivered' WHERE order_id=:orderid ";
            $stmt=$this->db->prepare($query);
            $stmt->bindParam(':orderid',$orderid );
            if($stmt->execute()){
              return true;
            }else{
              return false;
            }
          }
          

          public function getPaymentStatus($status)
          {
            $sql="SELECT * FROM orders WHERE payment_status=:status";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            return $stmt;

          }

          public function confirmedOrders($confirm){
            $sql="SELECT * FROM orders WHERE payment_confirmation=:confirmed";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":confirmed", $confirm);
            $stmt->execute();
            return $stmt;
          
          }

          public function orderStatus($status){
            $sql="SELECT * FROM orders WHERE order_status=:status";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            return $stmt;
          
          }

          public function paymentType($type){
            $sql="SELECT * FROM orders WHERE payment_type=:type";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":type", $type);
            $stmt->execute();
            return $stmt;
          }

          public function countUndeliveredOrders(){
            $query="SELECT * FROM orders WHERE  order_status=:status ";
            $status="undelivered";
            $prepnotify=$this->db->prepare($query);
            $prepnotify->bindParam(':status',$status );
            $prepnotify->execute();
            return $prepnotify->rowCount();
          }      

        
    


}

?>