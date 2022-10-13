<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Report{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new category
        public function createReports($name, $creator, $created_at,$creator_id){  
               try{
                
                   $sql="INSERT INTO reports(name, transaction_id, subject, email, phone, information,created_at ) VALUES (:category_name, :creator, :created, :creator_id )";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":category_name"=>$name,
                        ":creator" =>$creator,
                        ":created" =>$created_at,
                        ":creator_id" =>$creator_id
                   ]);
   
                   if($result){
                     return true;
                       }else{
                    //   echo "error while creating category";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
    }   //create()
   
  
    public function getReports()
    {             
      $sql="SELECT * FROM categories";
      $stmt=$this->db->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

    public function deleteReports(){

    }

   


}
    
    ?>

