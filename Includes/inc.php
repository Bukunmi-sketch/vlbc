<?php 

            //import users class file

use Users\Member;

    include '../Models/Auth.php';  
    include '../Models/User.php';  
    include '../Models/Login.php';  
    include '../Models/Register.php';  
    include '../Models/Member.php';  
    include '../Models/Order.php';  
    include '../Models/Customer.php';
    include '../Models/Unit.php';
    include '../Models/Report.php';
    include '../Models/Notification.php';
    include '../Models/Payment.php';
    include '../Models/Dashboard.php';
      // create of object of the user class
    $authInstance= new Auth($conn);
    $userInstance= new User($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    $memberInstance = new User\Member($conn);
    $orderInstance = new Order($conn);
    //$customersInstance = new Customer($conn);
    $unitInstance = new Unit($conn);
    $reportInstance = new Report($conn);
    $payInstance = new Payment($conn);
    $notifyInstance = new Notification($conn);
    $dashboardInstance =new Dashboard($conn);
    
    $dirfile="../Images/product-img/";

/*
 /";
   $postdirfile="../Images/post_img/post-image--";
   $coverdirfile="../Images/cover_img/";
   //$dirfile='..../Images/signup_img/'

*/

     ?>