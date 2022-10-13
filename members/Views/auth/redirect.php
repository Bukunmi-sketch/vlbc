<?php 
 /*if( !$authInstance->isloggedin() ){
   $authInstance->redirect('login.php');
  }

  */
  

  if( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
    $authInstance->redirect("login.php");
  }

  //when users logs out call the logout function and redirect them to the login page.
  if( isset($_GET['logout']) && ($_GET['logout']=='true')  ){
     $authInstance->logout($sessionid);
     $authInstance->redirect("login.php");
  }

  $_SESSION["lastactivity"]=time();
  $_SESSION['lastactivetime']=date("h:ia");; 
  $_SESSION['lastactivedate']=date("y-m-d");
  $_SESSION['datelastactivity']=date('y-m-d h:i:s');   
  $loginInstance->lastActivity($_SESSION["id"],$_SESSION["lastactivity"], $_SESSION['lastactivetime'], $_SESSION['lastactivedate'],$_SESSION['datelastactivity']); 
 


?>