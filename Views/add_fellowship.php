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

    $name=$firstname . $lastname;
  
?>
<!doctype html>
<html lang="en">
<head>
    <title>House Fellowships</title>
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
    <div class="min-sub-container" >
        <div class="spanheader">
            <span><h4> Create House Fellowship </h4></span>
        </div>

        <form action="#" method="POST">
            <div class="error"></div>
        <div class="inputbox-details">
             <input type="text" id="passa" name="fellowshipname" value="" placeholder="Add New House Fellowship" autofocus required>
         </div>

         <div class="button-details">
            <button class="submit" name="create">Add</button>
            <input type="hidden" name="creator_name" value=<?php echo $name; ?> >
            <input type="hidden" name="creator_id" value=<?php echo $sessionid; ?> >
         </div>

     </form>

 </div>

 <?php 
          $stmt=$fellowshipInstance->getFellowship();
          $fellowshipData=$stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
 <?php  if($stmt->rowCount() > 0 ): ?>

       
<div class="table-container">
  <table>
    <tr>
      <th>Manage</th>
      <th>fellowship Name</th>
      <th>Created by</th>
      <th>Created_date</th>
     
    </tr>
    <?php foreach($fellowshipData as $fellowship): ?>
    <tr>
      <td>  <button class="deletebtn"> Delete </button></td>
      <td> <?php echo  "{$fellowship['name']}" ; ?> </td>
      <td> <?php echo  "{$fellowship['added_by']}" ; ?>  </td>
      <td>  <?php  echo date("D,F j Y",  strtotime($fellowship['added_date'])); ?> </td>
    </tr>
      <?php endforeach ?>
  </table>

      <?php else: ?>
      <div class="no-value" style="text-align:center">
            <h4>you have not added any fellowship</h4>
      </div>      
       <?php endif ?>

</div>

</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/createfellowship.js"></script>
     </body>

</html>
