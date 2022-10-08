<?php

//namespace pay;

require '../Includes/db.inc.php';
 // session_start();

   class Dashboard{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        public function countMembers(){
          $query="SELECT * FROM members";
          $stmt=$this->db->prepare($query);
          $stmt->execute();
          return $stmt->rowCount();
        }
      
        public function countCategories(){
          $query="SELECT * FROM categories";
          $stmt=$this->db->prepare($query);
          $stmt->execute();
          return $stmt->rowCount();
        }
      
        public function totalIncome(){
          $query="SELECT SUM(amount) AS amount FROM orders WHERE payment_status=:status ";
          $status="paid";
          $statement=$this->db->prepare($query);
          $statement->bindParam(':status',$status );
          $statement->execute();
          return $statement;
        }

        public function highestPayment(){
          $query="SELECT MAX(amount) AS amount,customers_name FROM orders WHERE payment_status=:status ";
          $status="paid";
          $statement=$this->db->prepare($query);
          $statement->bindParam(':status',$status );
          $statement->execute();
          return $statement;
        }

        public function lowestPayment(){
          $query="SELECT MIN(amount) AS amount,customers_name FROM orders WHERE payment_status=:status ";
          $status="paid";
          $statement=$this->db->prepare($query);
          $statement->bindParam(':status',$status );
          $statement->execute();
          return $statement;
        }

        public function lastOrder(){
          $query="SELECT * FROM orders ORDER BY id ASC  LIMIT 21";
          $statement=$this->db->prepare($query);
          $statement->execute();
          return $statement;
        }
       
        public function countOrders(){
          $query="SELECT * FROM orders";
          $statement=$this->db->prepare($query);
          $statement->execute();
          return $statement->rowCount();
        }
        
        public function countUnpaidOrders(){
          $query="SELECT * FROM orders WHERE  payment_status=:status ";
          $status="unpaid";
          $statement=$this->db->prepare($query);
          $statement->bindParam(':status',$status );
          $statement->execute();
          return $statement->rowCount();
        }

        public function countpaidOrders(){
          $query="SELECT * FROM orders WHERE  payment_status=:status ";
          $status="paid";
          $statement=$this->db->prepare($query);
          $statement->bindParam(':status',$status );
          $statement->execute();
          return $statement->rowCount();
        }
      
      
     public function countNewPayment(){
      $query="SELECT * FROM orders WHERE  notify_newpay=:newklump OR notify_newpay=:newFlutter";
      $newklump="unreadKlump";
      $newFlutter="unreadFlutterwave";
      $statement=$this->db->prepare($query);
      $statement->bindParam(':newklump',$newklump );
      $statement->bindParam(':newFlutter',$newFlutter);
      $statement->execute();
      return $statement->rowCount();
    }   
            
     
     public function countKlumpPayment(){
      $query="SELECT * FROM orders WHERE  payment_type=:type ";
      $type="klump";
      $statement=$this->db->prepare($query);
      $statement->bindParam(':type',$type );
      $statement->execute();
      return $statement->rowCount();
    }   
    
    public function countFlutterwavePayment(){
      $query="SELECT * FROM orders WHERE  payment_type=:type ";
      $type="flutterwave";
      $statement=$this->db->prepare($query);
      $statement->bindParam(':type',$type );
      $statement->execute();
      return $statement->rowCount();
    }   

    public function countUndeliveredOrders(){
      $query="SELECT * FROM orders WHERE  order_status=:status ";
      $status="undelivered";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }          
  
    public function countdeliveredOrders(){
      $query="SELECT * FROM orders WHERE  order_status=:status ";
      $status="delivered";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }          
  

}        

?>