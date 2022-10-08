<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Unit{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new Unit
        public function createUnit($name, $creator, $created_at){  
               try{
                
                   $sql="INSERT INTO unit_ministry(name, added_by, created_at) VALUES (:Unit_name, :creator, :created)";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":Unit_name"=>$name,
                        ":creator" =>$creator,
                        ":created" =>$created_at
                   ]);
   
                   if($result){
                     return true;
                  }else{
                    //   echo "error while creating Unit";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
    }   //create()
   
                                  //if produxtname already exist  //auth
public function IfUnitExisted($Unitname){
    try{
    
      $sql="SELECT * FROM unit_ministry WHERE name =:Unitname";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':Unitname', $Unitname);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "Unit name already existeds";
          return false;
       } else{   
          //   echo 'continue to create Unit';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }

  
    public function getunitMinistry()
    {             
      $sql="SELECT * FROM unit_Ministry";
      $stmt=$this->db->prepare($sql);
      $stmt->execute();
      return $stmt;
    }


}
