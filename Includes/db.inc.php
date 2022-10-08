<?php
/*
  $servername="fdb26.awardspace.net";
   $username="3320362_hmm";
   $password="Computer19";
   $dbname="3320362_hmm";
  $servername = "localhost";
   */
  
 
  $servername="localhost";
   $username="root";
   $password="";
   $dbname="vlbc";
  
   
  


   try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($conn){
      //  echo "connected succesfully";
       // echo "<br>";
    }
    else{
     //   echo "can't connect";
    }

  }
   catch(PDOException $e){
       echo "error while connecting to the database" .  $e->getMessage() ;
   }

   

    



?>