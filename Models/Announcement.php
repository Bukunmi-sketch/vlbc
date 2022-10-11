<?php

error_reporting(1);
require '../Includes/db.inc.php';
 

   class Announcement{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new category
        public function createAnnouncement($title, $content, $typefor,$date, $picture,$status){  
          try{
              
              $sql="INSERT INTO announcement(title, content, typefor, date, img, active_status) VALUES (:title, :content, :typefor, :date, :picture,:status )";
                $stmt= $this->db->prepare($sql);
                 $result=  $stmt->execute([
                   ":title"=>$title,
                   ":content" =>$content,
                   ":typefor" =>$typefor,
                   ":date" =>$date,
                   ":picture" =>$picture,
                   ":status" =>$status
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



           public function getAnnouncement()
           {             
             $sql="SELECT * FROM Announcement";
             $stmt=$this->db->prepare($sql);
             $stmt->execute();
             return $stmt;
           }

           public function deleteAnnoucement($id){
            try{
                $sqldelete='DELETE FROM Announcement WHERE id=:id';
                $stmt=$this->db->prepare($sqldelete);
                $stmt->bindParam(":id", $id);
                if($stmt->execute()){
                  return true;
                }else{
                  return false;
                }
              }catch(PDOException $e){
                echo $e->getMessage();
              }   

           }

           public function getActiveAnnouncement(){
            try{
                $status="true";
                $sql="SELECT * FROM announcement WHERE active_status=:status";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":status", $status);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
              echo $e->getMessage();
            }
           }

          public function blockAnnouncement($id)
          {
            $query="UPDATE announcement SET active_status='false' WHERE id=:id ";
            $stmt=$this->db->prepare($query);
            $stmt->bindParam(':id',$id );
            if($stmt->execute()){
              return true;
            }else{
              return false;
            }
          }
          
}

?>