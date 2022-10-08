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
   
   $orderInstance=new Order($conn);

         $stmt=$orderInstance->getOrders();
         $stmt->fetchAll(PDO::FETCH_ASSOC);
         $number_of_result=$stmt->rowCount();

         //define total number of results you want per page  
         $results_per_page = 10;  

         //determine the total number of pages available  
         $totalPages = ceil ($number_of_result / $results_per_page);  

          //determine which page number visitor is currently on  
          if (!isset ($_GET['page']) ) {  
              $page = 1;  
          } else {  
              $page = $_GET['page'];  
          }  
          //determine the sql LIMIT starting number for the results on the displaying page  
          $startFrom = ($page-1) * $results_per_page;  

          if( isset($_GET['read']) && ($_GET['read']=='true')  ){
            $notifyInstance->readNotification();
        }
    
    
?>

<!doctype html>
<html lang="en">
<head>
    <title>Trash Order</title>
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
        <?php 
        include './components/left.php' ;
          $days="1";
         // $sort=$_POST['sortorders'];
    
          $pagesql="SELECT * FROM orders WHERE created_at <=NOW() - INTERVAL ".$days." DAY ORDER BY id ASC  LIMIT ". $startFrom . ',' . $results_per_page;
          $statement=$conn->prepare($pagesql);
          $statement->execute();
          $orderData=$statement->fetchAll(PDO::FETCH_ASSOC);

        
        ?>
         
        
        <div class="middle">

        <?php  if($statement->rowCount() > 0 ): ?>   
         
        <h5>Note all orders here are older than 30 days ago and current time : <?php echo date('h:i:sa'); ?>, orders here are suggested to be deleted as they are likely to be redundant to clear up space</h5>
        
        <div class="inputbox-details">
            <label for="sortorders"> Sort orders by old or latest</label>
            <select name="sortorders">
                <option value="ASC">Old</option>
                <option value="DESC">Latest</option>
            </select>

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
      <td> <!-- <button class="editbtn">Edit</button> --> <button data-identity="<?php echo  "{$orders['order_id']}" ; ?>" class="deletebtn">Delete</button> </td>  
    </form>    
      <td> <?php echo  "{$orders['order_id']}" ; ?> </td>
      <td> <?php echo  "{$orders['customers_firstname']} {$orders['customers_lastname']}" ; ?>  </td>
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
           <a href='trashorder.php?page=<?php echo ($page-1); ?>'>  Prev </a> 
         <?php endif ?>  
         
         <?php for($i = 1; $i<= $totalPages; $i++): ?> 
             <?php if($i == $page): ?>
               <a href ="trashorder.php?page=<?php echo $i; ?>" class ="active"> <?php echo $i ; ?> </a> 
             <?php else: ?>
                <a href ="trashorder.php?page=<?php echo $i; ?>" > <?php echo $i ; ?> </a> 
             <?php endif ?>   
         <?php endfor ?>

         <?php if($page<$totalPages): ?>   
            <a href='trashorder.php?page=<?php echo ($page+1); ?>'>  Next </a>  
         <?php  endif ?>
      </div>
         <div class="inline">   
           <input id="page" type="number" min="1" max="<?php echo $totalPages?>" placeholder="<?php echo $page."/".$totalPages; ?>" required>   
           <button onClick="go2Page();">Go</button>  
        </div>   
</div>

    <?php else: ?>
        <h4>there are no orders older than <?php echo $days; ?> days ago</h4>
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
                  window.location.href = 'trashorder.php?page='+page;   
                }   

           </script>
   
     </body>

</html>
