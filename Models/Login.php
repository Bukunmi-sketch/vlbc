<?php 
//namespace Users;
require '../Includes/db.inc.php';


 class Login{
    
    private $db;

    public function __construct($conn)
    {
        $this->db= $conn;
    }
    


                   //logih users
   public function login($email,$password){
    try{
       
         $sql="SELECT * FROM administrator WHERE email =:email";
         $stmt= $this->db->prepare($sql);
         $stmt->bindParam(':email', $email);
         $stmt->execute();
         // Check if row is actually returned
         if($stmt->rowCount() > 0 ){
              //Return row as an array indexed by both column name
             $returned_row= $stmt->fetch(PDO::FETCH_ASSOC);  
             // Verify hashed password against entered password
           if(password_verify($password, $returned_row['password'])){            
                     //define session if login was succesful
                return [
                   'id' =>        $returned_row['id'],
                   'firstname'=>  $returned_row['firstname'], 
                   'email' =>     $returned_row['email'],
                   'lastname' =>  $returned_row['lastname'],
                   'date' =>      $returned_row['reg_date'],
                   'password'=>   $returned_row['password']
                   ];
                   
             echo "password is correct";
             }else{
             //   echo "incorrect password";
                return false;
                 }
            } else{
        //    echo "user does not exist";
           return false;
        }
    }catch(PDOException $e){
        echo  $e->getMessage(); 
    }
  
}  //login

public function loginSetStatusOnline($sessionid){
    $query="UPDATE administrator SET Status='online' WHERE id=:sessionid ";
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(":sessionid", $sessionid);
    if($stmt->execute()){
       return true;
    }
  }

  public function lastActivity($sessionid,$activitytime,$activetime,$activedate,$datelastactivity){
   $query="UPDATE administrator SET LastActivity=:activitytime, LastActiveTime=:activetime, LastActiveDate=:activedate,DateLastActivity=:datelastactivity WHERE id=:sessionid ";
   $stmt=$this->db->prepare($query);
   $stmt->bindParam(":sessionid", $sessionid);
   $stmt->bindParam(":activitytime", $activitytime);
   $stmt->bindParam(":activetime", $activetime);
   $stmt->bindParam(":activedate", $activedate);
   $stmt->bindParam(":datelastactivity", $datelastactivity);
   if($stmt->execute()){
      return true;
   }
 }

 public function usersLogData($sessionid,$ipaddress,$browsertype){
    $query="UPDATE administrator SET ip_address=:ipaddress, browser_type=:browser_type WHERE id=:sessionid ";
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(":sessionid", $sessionid);
    $stmt->bindParam(":ipaddress", $ipaddress);
    $stmt->bindParam(":browser_type", $browsertype);
    if($stmt->execute()){
       return true;
    }

   }

 

}





?>