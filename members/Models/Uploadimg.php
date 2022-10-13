<?php
  require '../Includes/db.inc.php';
   // session_start();
  
     class Uploadimg{
          private $db;
         
          public function __construct($conn)
          {
              $this->db= $conn;
          }

           
public function imgextension($dp){
            
    $img_explode=explode('.',$dp);
    $img_ext=end($img_explode);
    $extensions=['png','jpeg','jpg'];
    
    if(in_array($img_ext,$extensions)==true){
           return true;
       //  echo "file is correct";
    }
    else{
     //echo "file must be png,jpg or jpeg";
       return false;
    }

}
 
public function largeImage($imagesize){
   
 if($imagesize > 60000000){
    //  echo "file is to large";
      return false;
 }else{
   //  echo 'file is okay';
   return true;
 }
}
 
public function moveImage($imgtmp, $dirfile){
 if(move_uploaded_file($imgtmp, $dirfile)){
        return true;
 }else{
         return false;
 }
 
}
 

    }


?>