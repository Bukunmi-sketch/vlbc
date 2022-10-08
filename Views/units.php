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
  
   
   // include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">
<head>
    <title>Ministry / Unit</title>
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
            <span><h4> Create a Unit Ministry </h4></span>
        </div>

        <form action="#" method="POST">
            <div class="error"></div>
        <div class="inputbox-details">
             <input type="text" id="passa" name="unit_name" value="" placeholder="create a unit or Ministry" autofocus required>
         </div>

         <div class="button-details">
            <button class="submit" name="create">Add</button>
            <input type="hidden" name="creator_name" value=<?php echo $name; ?> >
            <input type="hidden" name="creator_id" value=<?php echo $sessionid; ?> >
         </div>

     </form>

 </div>

 <?php 
          $stmt=$unitInstance->getunitMinistry();
          $unitData=$stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
 <?php  if($stmt->rowCount() > 0 ): ?>

       
<div class="table-container">
  <table>
    <tr>
      <th>Manage</th>
      <th>unit Name</th>
      <th>Created by</th>
      <th>Created_date</th>
     
    </tr>
    <?php foreach($unitData as $unit): ?>
    <tr>
      <td>  <button class="deletebtn"> Delete </button></td>
      <td> <?php echo  "{$unit['name']}" ; ?> </td>
      <td> <?php echo  "{$unit['added_by']}" ; ?>  </td>
      <td>  <?php  echo date("D,F j Y",  strtotime($unit['created_at'])); ?> </td>
    </tr>
      <?php endforeach ?>
  </table>

      <?php else: ?>
      <div class="no-value" style="text-align:center">
            <h4>you have not added any unit</h4>
      </div>      
       <?php endif ?>

</div>

</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/createunit.js"></script>
     </body>

</html>
