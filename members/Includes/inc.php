<?php 

            //import users class file

//use Users\Member;

    include '../Models/Auth.php';  
    include '../Models/User.php';  
    include '../Models/Login.php';  
    include '../Models/Register.php';  
    include '../Models/Member.php';  
    include '../Models/Announcement.php';  
    include '../Models/Fellowship.php';
    include '../Models/Birthday.php';
    include '../Models/Unit.php';
    include '../Models/Report.php';
    include '../Models/Notification.php';
    include '../Models/Uploadimg.php';
    include '../Models/Dashboard.php';
      // create of object of the user class
    $authInstance= new Auth($conn);
    $userInstance= new User($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    $fellowshipInstance = new Fellowship($conn);
    $birthdayInstance = new Birthday($conn);
    $memberInstance = new User\Member($conn);
    $announceInstance = new Announcement($conn);
    $imgInstance= new Uploadimg($conn);
    $unitInstance = new Unit($conn);
    $reportInstance = new Report($conn);
    $notifyInstance = new Notification($conn);
    $dashboardInstance =new Dashboard($conn);
    
    //$dirfile="../Images/product-img/";

/*
 /";
   $postdirfile="../Images/post_img/post-image--";
   $coverdirfile="../Images/cover_img/";
   //$dirfile='..../Images/signup_img/'

*/

     ?>