<?php
  session_start();  
  ob_start();

 // include '../Includes/inc.php';
 include '../Includes/autoload.php';
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
    <title>Paid Order</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
            
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
          <?php  include './components/left.php' ; ?>

        <?php 

    //    $sort=$_POST['sortorders'];
         $stmt=$orderInstance->getPaymentStatus("paid");
          $number_of_result=$stmt->rowCount(); 
          $results_per_page = 10;  
          $totalPages = ceil ($number_of_result / $results_per_page);  
 
           if (!isset ($_GET['page']) ) {  
               $page = 1;  
           } else {  
               $page = $_GET['page'];  
           }  
      
           $startFrom = ($page-1) * $results_per_page;  
           $status="paid";
           $sql="SELECT * FROM orders WHERE payment_status=:status ORDER BY id ASC LIMIT ". $startFrom . ',' . $results_per_page;
           $stmt=$conn->prepare($sql);
           $stmt->bindParam(":status", $status);
           $stmt->execute();
           $orderData=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        ?>
         
        
        <div class="middle">
        <?php  if($stmt->rowCount() > 0 ): ?>
        
        <h5>Note: only paid orders are included here, it certifies customers has paid for the product either through klump or flutterwave </h5>
        <form action="paid.php"></form>
        <div class="inputbox-details">
            <label for="sortorders"> Sort orders by old or latest</label>
            <select name="sortorders">
                <option value="ASC">Old</option>
                <option value="DESC">Latest</option>
            </select>
          </form>  
        </div>

<div class="table-container">
  <table>
    <tr>
      <th> Action </th>
      <th> Order id</th>
      <th>Customer Name</th>
      <th>Customers Phone No</th>
      <th>Customers Request item</th>
      <th>Customers Email</th>
      <th>Amount Paid</th>
      <th>Customers State</th>
      <th>Local Gov</th>
      <th>Customers Address</th>
      <th>Payment status</th>
      <th>Payment Type</th>
      <th>Order Status</th>
      <th>Date order was placed</th>
      <th>Time order was placed</th>
      <th>Additional Info</th>
      <th>Transaction Reference</th>
      <th>Payment Confirmation</th>
    </tr>
    <?php foreach($orderData as $orders): ?>
    <div >
    <tr class="trr" id="eachorder<?php echo  "{$orders['order_id']}" ; ?>">  
    <form action="" class="order-modify">    
      <td> <!--<button class="editbtn">Edit</button>--> <button data-identity="<?php echo  "{$orders['order_id']}" ; ?>" class="deletebtn">Delete</button> </td>  
    </form>    
      <td> <?php echo  "{$orders['order_id']}" ; ?> </td>
      <td><?php echo  "{$orders['customers_firstname']} {$orders['customers_lastname']}" ; ?>   </td>
      <td> <?php echo  "{$orders['phone_no']}" ; ?> </td>
      <td> <?php echo  "{$orders['cart_items']}" ; ?> </td>
      <td> <?php echo  "{$orders['email']}" ; ?> </td>
      <td> <?php echo  "{$orders['amount']}" ; ?>  </td>
      <td> <?php echo  "{$orders['state']}" ; ?>  </td>
      <td> <?php echo  "{$orders['customers_lga']}" ; ?>  </td>
      <td> <?php echo  "{$orders['customers_address']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_status']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_type']}" ; ?>  </td>
      <td> <?php echo  "{$orders['order_status']}" ; ?>  </td>
      <td> <?php  echo date("D,F j Y",  strtotime($orders['created_at'])); ?> </td>
      <td> <?php  echo date("H:i a",  strtotime($orders['created_at'])); ?> </td>
      <td> <?php echo  "{$orders['additional_info']}" ; ?>  </td>
      <td> <?php echo  "{$orders['transaction_ref']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_confirmation']}" ; ?>  </td>
    </tr>
    </div>
      <?php endforeach ?>
  </table>
</div>
  <div class="next-prev">
      <div class="move-button">
         <?php if($page>=2): ?> 
           <a href='paid.php?page=<?php echo ($page-1); ?>'>  Prev </a> 
         <?php endif ?>  
         
         <?php for($i = 1; $i<= $totalPages; $i++): ?> 
             <?php if($i == $page): ?>
               <a href ="paid.php?page=<?php echo $i; ?>" class ="active"> <?php echo $i ; ?> </a> 
             <?php else: ?>
                <a href ="paid.php?page=<?php echo $i; ?>" > <?php echo $i ; ?> </a> 
             <?php endif ?>   
         <?php endfor ?>

         <?php if($page<$totalPages): ?>   
            <a href='paid.php?page=<?php echo ($page+1); ?>'>  Next </a>  
         <?php  endif ?>
      </div>
         <div class="inline">   
           <input id="page" type="number" min="1" max="<?php echo $totalPages?>" placeholder="<?php echo $page."/".$totalPages; ?>" required>   
           <button onClick="go2Page();">Go</button>  
        </div>   
</div>

    <?php else: ?>
        <h4>No payment has been made for ony ordered item</h4>
    <?php endif ?>
        </div>

    




    </div> 
       
   </main>
          
         
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/del-order.js"></script>

           <script>
              function go2Page() {   
                  var page = document.getElementById("page").value;   
                  page = (  ( page  >  <?php echo $totalPages; ?> ) ? <?php echo $totalPages; ?>  :  (  ( page < 1 ) ? 1 : page )   );   
                  window.location.href = 'paid.php?page='+page;   
                }   

           </script>
   
     </body>

</html>
