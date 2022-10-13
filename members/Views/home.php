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
    <title>Home,welcome to vlbc</title>
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

            <?php 
                $countOrder=$dashboardInstance->countOrders();
            ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>TOTAL ORDERS</h4>
                       <p><?php echo $countOrder ?></p>
                   </div>
               </div>

            <?php 
                $countUnpaidOrder=$dashboardInstance->countUnpaidOrders();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>UNPAID ORDERS</h4>
                       <p><?php echo  $countUnpaidOrder ?></p>
                   </div>
               </div>

               <?php 
                $countpaidOrder=$dashboardInstance->countpaidOrders();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>PAID ORDERS</h4>
                       <p><?php echo  $countpaidOrder ?></p>
                   </div>
               </div>

               <?php 
                $countKlumpPay=$dashboardInstance->countKlumpPayment();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>KLUMP PAYMENT</h4>
                       <p><?php echo  $countKlumpPay ?></p>
                   </div>
               </div>

               <?php 
                $countflutterwavePay=$dashboardInstance->countFlutterwavePayment();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>FLUTTERWAVE PAYMENT</h4>
                       <p><?php echo  $countflutterwavePay ?></p>
                   </div>
               </div>

               <?php 
                $stmt=$dashboardInstance->totalIncome();
                $totalincome=$stmt->fetch(PDO::FETCH_ASSOC);
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>TOTAL INCOME</h4>
                       <p><?php echo $totalincome['amount']; ?></p>
                   </div>
               </div>

               <?php 
                $countdelivered=$dashboardInstance->countdeliveredOrders();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>DELIVERED ORDERS</h4>
                       <p><?php echo  $countdelivered ?></p>
                   </div>
               </div>

               <?php 
                $countundelivered=$dashboardInstance->countUndeliveredOrders();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>UNDELIVERED ORDERS</h4>
                       <p><?php echo  $countundelivered ?></p>
                   </div>
               </div>

               <?php 
                $countcategory=$dashboardInstance->countCategories();
              ?>
               <div class="box">
                 <div class="boxa" style="background-color: <?php echo "{$arr[$key]}" ; ?>;"></div>
                   <div class="boxb">
                   <h4>AVAILABLE CATEGORIES</h4>
                       <p><?php echo  $countcategory ?></p>
                   </div>
               </div>


           </div>
           
           <div class="stats">
               <p>DATE OF LAST ORDER:
               <?php 
                $stmt=$dashboardInstance->lastOrder();
                $lastdata=$stmt->fetch(PDO::FETCH_ASSOC);
                $date= date('D,F j Y',  strtotime($lastdata['created_at']));
               echo "{$date} ordered by {$lastdata['customers_name']}";
             
              // // }
              ?>     
            </p>
               <p>HIGHEST PAYMENT MADE: 
               <?php 
                $stmt=$dashboardInstance->highestPayment();
                $highestpay=$stmt->fetch(PDO::FETCH_ASSOC);
                echo "{$highestpay['amount']} paid by {$highestpay['customers_name']}" 
              ?> 
               </p>
               <p>LOWEST PAYMENT MADE:
               <?php 
                $stmt=$dashboardInstance->lowestPayment();
                $lowestpay=$stmt->fetch(PDO::FETCH_ASSOC);
                echo "{$lowestpay['amount']} paid by {$lowestpay['customers_name']}" 

              ?> 
               </p>
               <p></p>
           </div>

</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
     </body>

</html>
