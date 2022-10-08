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
   
?>
<!doctype html>
<html lang="en">
<head>
    <title>Send Email</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
       
        <div class="middle">

<div class="min-sub-container" >
     
       <div class="spanheader">
           <span><h4> Send Email </h4></span>
       </div>

       <form class="create" action="#"  enctype="multipart/form-data">
           <div class="error"></div>

     
             <div class="inputbox-details">
                 <label for="From">From</label>
                 <input type="text" id="passa" name="sender"  placeholder="From" value="  " autofocus autocomplete="on">
             </div>

             <div class="inputbox-details">
                 <label for="To">To</label>
                <input type="text" id="passa" name="receiver" placeholder="To" value=" "  autofocus autocomplete="on">
             </div>

             <div class="inputbox-details">
                 <label for="Subject">Subject</label>
                <input type="text" id="passa" name="subject" placeholder="Subject" value=" "  autofocus autocomplete="on">
             </div>
      

            <div class="inputbox-details">
                <label for="Message">Message</label>
                <textarea id="passa" name="message"  class="description" placeholder="Message" autofocus value=" " autocomplete="on"></textarea>
            </div>


        <div class="button-details">
           <input type="hidden"  name="admin" value="<?php echo $sessionid; ?> "  autofocus >
           <button class="submit" name="login">Send Email</button>
        </div>

    </form>

</div>
</div>



        </div>
   </main>
          
           <script src="../Resources/js/sendemail.js"></script>
           <script src="../Resources/js/sidebar.js"></script>

     </body>

</html>
