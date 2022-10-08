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
              <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
       
        <div class="middle">
        <?php 
          $stmt=$userInstance->getAllUsers();
          $adminData=$stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>


        <div class="table-container">
            <h3>List of Admins Account</h3>
        <table>
    <tr>
    
      <th>Admin Name</th>
      <th>Email</th>
      <th>Created_date</th>
     
    </tr>
    <?php foreach($adminData as $admin): ?>
    <tr>
   
      <td> <?php echo  "{$admin['firstname']}" ; ?> <?php echo  "{$admin['lastname']}" ; ?> </td>
      <td> <?php echo  "{$admin['email']}" ; ?>  </td>
      <td> <?php  echo date("D,F j Y",  strtotime($admin['reg_date'])); ?></td>
    </tr>
      <?php endforeach ?>
  </table>
</div>

<div class="min-sub-container" >
     
       <div class="spanheader">
           <span><h4> Edit Admin Account </h4></span>
       </div>

       <form class="create" action="#"  enctype="multipart/form-data">
           <div class="error"></div>

        <div class="flex-inbox">
             <div class="inputbox-details">
                 <label for="productName">Firstname</label>
                 <input type="text" id="passa" name="product_name"  placeholder="From" value="  " autofocus >
             </div>

             <div class="inputbox-details">
                 <label for="productPrice">Lastname</label>
                <input type="number" id="passa" name="product_price" placeholder="To" value=" "  autofocus >
             </div>
        </div>

        <div class="flex-inbox">
             <div class="inputbox-details">
                 <label for="productPrice">Email</label>
                <input type="number" id="passa" name="product_price" placeholder="Email" value=" "  autofocus >
             </div>
      

            <div class="inputbox-details">
                <label for="productDescription">Password </label>
                <input type="number" id="passa" name="product_price" placeholder="Password" value=" "  autofocus >
            </div>
        </div>

        <div class="button-details">
           <input type="hidden"  name="admin" value="<?php echo $sessionid; ?> "  autofocus >
           <button class="submit" name="login">Save</button>
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
