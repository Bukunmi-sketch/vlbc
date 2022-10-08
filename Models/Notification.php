<?php

//namespace pay;

require '../Includes/db.inc.php';
 // session_start();

   class Notification{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        public function unreadNotificationOrders(){
          $query="SELECT * FROM orders WHERE  notify_status=:status ";
          $status="unread";
          $prepnotify=$this->db->prepare($query);
          $prepnotify->bindParam(':status',$status );
          $prepnotify->execute();
          return $prepnotify->rowCount();
        }
      
       
       
        public function readNotification(){
          $status="unread";
          $query="UPDATE orders SET notify_status='read' WHERE notify_status=:status ";
           $status="unread";
          $stmt=$this->db->prepare($query);
          $stmt->bindParam(':status',$status );
          $stmt->execute();
        }
        
        public function unreadNotifyReports(){
          $query="SELECT * FROM reports WHERE  notify_status=:status ";
          $status="unread";
          $prepnotify=$this->db->prepare($query);
          $prepnotify->bindParam(':status',$status );
          $prepnotify->execute();
          return $prepnotify->rowCount();
        }
      
       /*
       
        public function readNotificationReports(){
              $query="UPDATE Orders SET notify_status='read' WHERE notify_status=:$status ";
               $status="unread";
              $stmt=$this->db->prepare($query);
              $stmt->bindParam(':status',$status );
              $stmt->execute();
            }
      */
     public function countNewPayment(){
      $query="SELECT * FROM orders WHERE  notify_newpay=:newklump OR notify_newpay=:newFlutter";
      $newklump="unreadKlump";
      $newFlutter="unreadFlutterwave";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':newklump',$newklump );
      $prepnotify->bindParam(':newFlutter',$newFlutter);
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }   
            

     public function countNewKlumpPayment(){
      $query="SELECT * FROM orders WHERE  notify_newpay=:status ";
      $status="unreadKlump";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }   

    public function readKlumpNotification(){
      $status="unreadKlump";
      $query="UPDATE orders SET notify_newpay='readKlump' WHERE notify_newpay=:status ";
      $stmt=$this->db->prepare($query);
      $stmt->bindParam(':status',$status );
      $stmt->execute();
    }    
    
    public function countNewFlutterwavePayment(){
      $query="SELECT * FROM orders WHERE  notify_newpay=:status ";
      $status="unreadFlutterwave";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }  
    
    public function readFlutterwaveNotification(){
      $status="unreadFlutterwave";
      $query="UPDATE orders SET notify_newpay='readFlutterwave' WHERE notify_newpay=:status ";
      $stmt=$this->db->prepare($query);
      $stmt->bindParam(':status',$status );
      $stmt->execute();
    }    

    public function countPaymentOnDelivery(){
      $query="SELECT * FROM orders WHERE  payment_type=:status ";
      $status="pay on delivery";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }  
    

}        

?>