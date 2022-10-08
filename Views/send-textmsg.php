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
           <span><h4> Send Text Message </h4></span>
       </div>

       <form class="create" action="#"  enctype="multipart/form-data">
           <div class="error"></div>

     
             <div class="inputbox-details">
                 <label for="productName">From</label>
                 <input type="text" id="passa" name="product_name"  placeholder="From" value="  " autofocus >
             </div>

             <div class="inputbox-details">
                 <label for="productPrice">To</label>
                <input type="number" id="passa" name="product_price" placeholder="To" value=" "  autofocus >
             </div>

             <div class="inputbox-details">
                 <label for="productPrice">Subject</label>
                <input type="number" id="passa" name="product_price" placeholder="Subject" value=" "  autofocus >
             </div>
      

            <div class="inputbox-details">
                <label for="productDescription">Message</label>
                <textarea id="passa" name="product_description"  class="description" placeholder="Message" autofocus value=" " ></textarea>
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
          
           <script src="../Resources/js/createProduct.js"></script>
           <script src="../Resources/js/sidebar.js"></script>

           <script type="text/javascript">
                function trigger(e){
                      document.querySelector("#capture").click();
		         }
     
               function displayImage(e) {
                    if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                  reader.readAsDataURL(e.files[0]);
    		 }
     	   }
           </script>
     </body>

</html>
