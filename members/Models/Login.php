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
   public function login($firstname,$lastname,$memberid){
    try{
       
         $sql="SELECT * FROM members WHERE firstname =:firstname AND lastname =:lastname AND rollid =:memberid";
         $stmt= $this->db->prepare($sql);
         $stmt->bindParam(':firstname', $firstname);
         $stmt->bindParam(':lastname', $lastname);
         $stmt->bindParam(':memberid', $memberid);
         $stmt->execute();
         // Check if row is actually returned
         if($stmt->rowCount() > 0 ){
              //Return row as an array indexed by both column name
             $returned_row= $stmt->fetch(PDO::FETCH_ASSOC);  
            
                return [
                   'id' =>        $returned_row['id'],
                   'firstname'=>  $returned_row['firstname'], 
                   'email' =>     $returned_row['email'],
                   'lastname' =>  $returned_row['lastname'],
                   'date' =>      $returned_row['date'],
                   'password'=>   $returned_row['password']
                   ];
                   
           //  echo "password is correct";
           
            } else{
        //    echo "user does not exist";
           return false;
            }
    }catch(PDOException $e){
        echo  $e->getMessage(); 
    }
  
}  //login
/*
public function loginSetStatusOnline($sessionid){
    $query="UPDATE members SET Status='online' WHERE id=:sessionid ";
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(":sessionid", $sessionid);
    if($stmt->execute()){
       return true;
    }
  }

  public function lastActivity($sessionid,$activitytime,$activetime,$activedate,$datelastactivity){
   $query="UPDATE members SET LastActivity=:activitytime, LastActiveTime=:activetime, LastActiveDate=:activedate,DateLastActivity=:datelastactivity WHERE id=:sessionid ";
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
    $query="UPDATE members SET ip_address=:ipaddress, browser_type=:browser_type WHERE id=:sessionid ";
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(":sessionid", $sessionid);
    $stmt->bindParam(":ipaddress", $ipaddress);
    $stmt->bindParam(":browser_type", $browsertype);
    if($stmt->execute()){
       return true;
    }

   }

 */

}





?>