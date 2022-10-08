<?php
//namespace Users;
require '../Includes/db.inc.php';
 // session_start();

   class Register{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //register new users
        public function register($firstname, $lastname, $email, $password, $date){  
               try{
                   //hash the password;
                   $user_hashed_password = password_hash($password, PASSWORD_DEFAULT );
   
                   $sql="INSERT INTO administrator(firstname,lastname, email, Status, Password, reg_date)VALUES   (:firstname, :lastname, :email, :status, :password, :date)";
                   $stmt= $this->db->prepare($sql);
                   $result=  $stmt->execute([
                        ":firstname"=>$firstname,
                        ":lastname" =>$lastname,
                        ":email" =>$email,
                        ":status" => 'online',
                        ":password" => $user_hashed_password,
                        ":date" =>$date
                   ]);
   
                   if($result){
                     return true;
                       }else{
                    //   echo "error while inserting";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
           }   //register()


                               //if email already exist  //auth
public function RegisterCheckemail($email){
    try{
    
      $sql="SELECT * FROM administrator WHERE email =:email";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "email has been used";
          return false;
       } else{   
          //   echo 'continue to sign up';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }



    public function fectchRegistedDetails($email){
      try{
         
           $sql="SELECT * FROM administrator WHERE email =:email";
           $stmt= $this->db->prepare($sql);
           $stmt->bindParam(':email', $email);
           $stmt->execute();
           if($stmt->rowCount() > 0 ){
               
               $returned_row= $stmt->fetch(PDO::FETCH_ASSOC);      
                  return [
                     'id' =>        $returned_row['id'],
                     'firstname'=>  $returned_row['firstname'], 
                     'email' =>     $returned_row['email'],
                     'lastname' =>  $returned_row['lastname'],
                     'date' =>      $returned_row['reg_date'],
                     'password'=>   $returned_row['password']
                  ];
                    } else{
         
             return false;
          }
      }catch(PDOException $e){
          echo  $e->getMessage(); 
      }
    }  

    public function RegisterCheckusername($username){
      try{
      
        $sql="SELECT * FROM administrator WHERE username =:username";
        $stmt= $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        // Check if row is actually returned
        if($stmt->rowCount() > 0 ){
          //  echo "username has been used";
            return false;
         } else{   
            //   echo 'continue to sign up';
               return true;
           }
      }catch(PDOException $e){
             echo  $e->getMessage(); 
         }
    }

    public function registerUsername($username,$userid,$country){
        $sql="UPDATE administrator SET username=:username,Country=:country WHERE id=:userid";   
        $stmtupdate=$this->db->prepare($sql);
        $stmtupdate->bindParam(":userid", $userid);
        $stmtupdate->bindParam(":username", $username);
        $stmtupdate->bindParam(":country", $country);
        if( $stmtupdate->execute()){
          return true;
        }else{
            return false;
        }
    }

    
 
    
    
    
  }  //login









?>