<?php
  session_start();  
  ob_start();

  include '../Includes/inc.php';
  include './auth/redirect.php';

    $sessionid=$_SESSION['id'];   
    $userInfo=$userInstance->getuserinfo($sessionid);
    $email =$userInfo['email'];
    $firstname=$userInfo['firstname'];
    $lastname= $userInfo['lastname'];
    $registered_date=$userInfo['date'];
   

   
   // include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">
<head>
    <title>dashboard afrimama</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/form.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dashboard.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
        <?php
                        $arr=[
                            1=>'red',
                            2=>'orange',
                            3=>'yellow',
                            4=>"green",
                            5=>"blue",
                            6=>"indigo",
                            7=>"violet",
                            8=>"orangered",
                            9=>"#cecece"
                        ];
                       
                        $key=array_rand($arr);
                        ?>

        <div class="middle">
            <h3>DASHBOARD OVERVIEW</h3>

           <div class="middle-content">

           <?php 
                $countMembers=$dashboardInstance->countMembers();
            ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                       <h4><i class="fa fa-users"></i> AVAILABLE MembersS</h4>
                       <p><?php echo $countMembers ?></p>
                   </div>
               </div>

          
           </div>
           
           <div class="stats">
              
           </div>

</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
     </body>

</html>
