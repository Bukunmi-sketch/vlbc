<?php

include '../Includes/autoload.php';
//include '../Includes/inc.php';

$imgInstance= new Uploadimg($conn);
$announceInstance = new Announcement($conn);
$authInstance=new Auth($conn);

$typefor="";
$title="";
$content="";
$status="";
$date="";
$picture="";

if($_SERVER['REQUEST_METHOD']=="POST"){


    $typefor=$authInstance->validate($_POST['typefor']);
    $title=$authInstance->validate(strtoupper($_POST['title']) );
    $content=$authInstance->validate($_POST['content']);
    $date=date("y-m-d h:ia");
    $admin_id=$_POST['creator_id'];
    $status="true";

    $picture=$_FILES['file_image']["name"];
    $dpsize=$_FILES['file_image']['size'];
    $dptemp=$_FILES['file_image']['tmp_name']; 
    $dir="../images/announce-img/";
    $dirfile=$dir.basename($picture);
    

    if(!empty($typefor) && !empty($title) && !empty($content) && !empty($picture) ){
      
          
                   if($imgInstance->imgextension($picture)){
                     if($imgInstance->largeImage($dpsize)){
                         if($imgInstance->moveImage($dptemp, $dirfile)){
                             if(  $announceInstance->createAnnouncement($title, $content, $typefor, $date, $picture, $status) ){
                            
                                echo "success";
                            }else{
                                echo "an error occurred while adding this annoucement";
                            }
                         }else{
                             echo "file failed to move";
                         }
                     }else{
                         echo "image is too large";
                     }     
              }else{
                 echo 'file is not an image';
              }
     
     }elseif( !empty($typefor) && !empty($title) && !empty($content)  && empty($picture) ){
         $picture="null.png";
                            
            if($announceInstance->createAnnouncement($title, $content, $typefor, $date, $picture, $status) ){                            
                echo "success";
            }else{
                echo "an error occurred while adding this annoucement";
            }
     }else{
       echo 'fields must be totally filled';
     }

}



?>