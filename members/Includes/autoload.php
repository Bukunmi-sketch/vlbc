<?php
require '../Includes/db.inc.php';
spl_autoload_register(function($className) {
             $file ='../Models/'.$className . '.php';
            if (file_exists($file)) {
                 // echo "$file included\n";
                  include $file;
            } else{
            throw new Exception("Unable to load $className.");
           }
        });

        
try {
    $authInstance= new Auth($conn);
    $userInstance= new User($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
   // $memberInstance = new User\Member($conn);
    $announceInstance = new Announcement($conn);
    $reportInstance = new Report($conn);
    $payInstance = new Payment($conn);
    $notifyInstance = new Notification($conn);
} catch (Exception $e) {
echo $e->getMessage(), "\n";
}  
?>