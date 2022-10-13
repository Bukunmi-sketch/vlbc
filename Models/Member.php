<?php

namespace User;
use PDOException;
use PDO;
require '../Includes/db.inc.php';

   class Member{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new Members
        public function createMembers($admin_id, $picture, $firstname, $lastname, $rollid, $email, $mobile, $gender, $marital, $fellowship, $residence, $prev_church, $origin, $ministry, $department, $birthday, $birthmonth, $date){  
               try{
                
                   $sql="INSERT INTO members(admin_id, image, firstname, lastname, rollid, email, mobile,	gender,	marital_status, fellowships, residence, previous_church, origin, ministry, department, birthday, birthmonth, date	)VALUES   (:admin_id, :picture,:firstname, :lastname, :rollid,  :email, :mobile, :gender, :marital, :fellowship, :residence, :prev_church, :origin, :ministry, :department, :birthday, :birthmonth, :created )";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":admin_id"=>$admin_id,
                        ":firstname" =>$firstname,
                        ":lastname" =>$lastname,
                        ":rollid" =>$rollid,
                        ":email" =>$email,
                        ":mobile" =>$mobile,
                        ":marital" =>$marital,
                        ":fellowship" =>$fellowship,
                        ":gender" =>$gender,
                        ":residence" =>$residence,
                        ":prev_church" =>$prev_church,
                        ":picture" => $picture,
                        ":origin" => $origin,
                        ":ministry" =>$ministry,
                        ":department" =>$department,
                        ":birthday" => $birthday,
                        ":birthmonth" =>$birthmonth,
                        ":created" =>$date
                   ]);
   
                   if($result){
                     return true;
                       }else{
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
           }   //create()


                               //if produxtname already exist  //auth
public function IfMemberExisted($firstname, $lastname, $mobile){
    try{
    
      $sql="SELECT * FROM members WHERE firstname =:firstname AND lastname =:lastname AND mobile =:mobile";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':lastname', $lastname);
      $stmt->bindParam(':mobile', $mobile);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "produxtname has been used";
          return false;
       } else{   
          //   echo 'continue to sign up';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }

    public function checkEmail($email){
      try{
      
        $sql="SELECT * FROM members WHERE email =:email";
        $stmt= $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // Check if row is actually returned
        if($stmt->rowCount() > 0 ){
          //  echo " used";
            return false;
         } else{   
            //   echo 'continue to sign up';
               return true;
           }
      }catch(PDOException $e){
             echo  $e->getMessage(); 
         }
      }

      public function checkMemberid($rollid){
        try{
        
          $sql="SELECT * FROM members WHERE rollid =:rollid";
          $stmt= $this->db->prepare($sql);
          $stmt->bindParam(':rollid', $rollid);
          $stmt->execute();
          // Check if row is actually returned
          if($stmt->rowCount() > 0 ){
            //  echo " used";
              return false;
           } else{   
              //   echo 'continue to sign up';
                 return true;
             }
        }catch(PDOException $e){
               echo  $e->getMessage(); 
           }
        }
  


           public function getMembers()
           {             
             $sql="SELECT * FROM members";
             $stmt=$this->db->prepare($sql);
             $stmt->execute();
             return $stmt;
           }


            //create new members
        public function updatemembers($productid, $picture, $product_name, $description, $category, $price, $available){  
          try{
           
              $sql="UPDATE members SET product_picture=:picture , product_name= :product_name , description= :description , category= :category , price=:price ,	available=:isavailable WHERE  id=:productid ";
                $stmt= $this->db->prepare($sql);
                 $result=  $stmt->execute([
                   ":productid"=>$productid,
                   ":description" =>$description,
                   ":picture" => $picture,
                   ":product_name" =>$product_name,
                   ":category" => $category,
                   ":price" =>$price,
                   ":isavailable" => $available
              ]);

              if($result){
                return true;
                  }else{
               return false;
              }
          } catch(PDOException $e){
              echo  $e->getMessage(); 
          }
      }   //updatate with pictures()

         //create new members
         public function updateWithoutPics($productid, $product_name, $description, $category, $price, $available){  
          try{
           
              $sql="UPDATE members SET product_name= :product_name , description= :description , category= :category , price=:price ,	available=:isavailable WHERE  id=:productid ";
                $stmt= $this->db->prepare($sql);
                 $result=  $stmt->execute([
                   ":productid"=>$productid,
                   ":description" =>$description,
                   ":product_name" =>$product_name,
                   ":category" => $category,
                   ":price" =>$price,
                   ":isavailable" => $available
              ]);

              if($result){
                return true;
                  }else{
               return false;
              }
          } catch(PDOException $e){
              echo  $e->getMessage(); 
          }
      }   //create()
         
         

           public function deleteProduct($productid){
            $deletesql="DELETE FROM members WHERE id=:product LIMIT 1 ";
             $stmt=$this->db->prepare($deletesql);
             $stmt->bindParam(":product", $productid);  
              if($stmt->execute()){
                 return true;
            //  echo 'product deleted';
              } else{
                 return false;
                // echo 'product cant be deleted';
              }       
          }

               //get all the details about the product
       public function getProductInfo($productid){
         try{
        $sql="SELECT * FROM members WHERE id=:productid";
        $stmt=$this->db->prepare($sql);
        $stmt->bindParam(":productid", $productid);
        $stmt->execute();
        $returned_row =$stmt->fetch(pdo::FETCH_ASSOC);
        return [
           'id' => $returned_row['id'],
          'product_name' =>         $returned_row['product_name'],
          'description'=>   $returned_row['description'],  
          'category' =>   $returned_row['category'],
          'price' =>      $returned_row['price'],
          'product_picture' =>      $returned_row['product_picture'],
          'available' =>      $returned_row['available']
          ];
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  } 


    


}

?>