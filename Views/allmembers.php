<?php
  session_start();  
  ob_start();

  $sessionid=$_SESSION['id'];  
 
  include '../Includes/inc.php';
  include './auth/redirect.php';

  
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
              <link rel="stylesheet" type="text/css" href="../Resources/css/item.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/modal.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/form.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
       
        <div class="middle">
      <div class="follow-unfollow">          
         <button type="submit" class="justbtn" ><a href="create.php"> Create product</a> </button>     
      </div>

      <?php 
          $getStmt= $productInstance->getProducts();
          $productData=$getStmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
        
        <?php  if($getStmt->rowCount() > 0 ): ?>
          
              <div class="userbox">
               <!---------------------each products -----------------> 
               <div class="userContainer">
                 <?php foreach($productData as $itemdata): ?>
                 <div class="each-user" id="eachproduct<?php echo  "{$itemdata['id']}" ; ?>">
                           <img src=" <?php echo $dirfile; ?><?php echo $itemdata["product_picture"]; ?>" alt=""  class="image"> 
                         
                           <div class="productname"> <?php echo  "{$itemdata['product_name']}" ; ?> </div>
                          
                           <div id="followers-count"  > 2 sales </div>
                           <div style="display: flex;">
                           <div id="followers-count"> <?php echo  "{$itemdata['category']}" ; ?> </div>
                           <a href="#"> <div class="profileview">view details</div></a>
                           <a href="#"> <div class="profileview"> <?php echo  "{$itemdata['available']}" ; ?></div></a>   
                           </div> 
                      <div id="followers-count">created: <?php echo  "{$itemdata['created_at']}" ; ?> </div> 

                      <div class="follow-unfollow">     
                           <form action="" class="product-modify">
                              <button data-productidentity="<?php echo  "{$itemdata['id']}" ; ?>" class="deletebtn" > Delete </button>                             
                              <button data-id="<?php echo  "{$itemdata['id']}" ; ?>" data-directory="<?php echo $dirfile; ?>" data-productname="<?php echo  "{$itemdata['product_name']}" ; ?>" data-description="<?php echo  "{$itemdata['description']}" ; ?>" data-picture="<?php echo  "{$itemdata['product_picture']}" ; ?>" data-price="<?php echo  "{$itemdata['price']}" ; ?>" data-available="<?php echo  "{$itemdata['available']}" ; ?>" data-category="<?php echo  "{$itemdata['category']}" ; ?>" class="justbtn" > update </button>  
                             
                            </form>   
                        </div>
                 </div>    
                 
 
                
                <?php endforeach ?>

                  <!---------------------each of each products ----------------->  
                </div>  
 
        
             </div> <!-- end of userbox --->
           
       <?php else: ?>
            <h4>there are no products available</h4>
       <?php endif ?>
   </div> <!---- end of middle --->

                                    <!--------------------------------------- MODAL UPDATE ------------------------------------------>
<div class="modal" id="eachmodal<?php echo  "{$itemdata['id']}" ; ?>" style=" display: none;">
   <div class="details-content" >
                         <div class="modal-header">
                            <span><h4> Edit this product </h4></span>
                            <span class="close" >&times</span>
                         </div>   
                         
                         
<div class="min-sub-container"   >
 <?php
   // $getProductid= $_GET['id'];
    $getProductid=$itemdata['id'];
    $productInfo= $productInstance->getProductInfo($getProductid);

    $productid = $productInfo['id'];
    $product_name = $productInfo['product_name'];
    $description=   $productInfo['description'];  
    $category =   $productInfo['category'];
    $price =      $productInfo['price'];
    $product_picture = $productInfo['product_picture'];
    $available = $productInfo['available'];
     ?>
    

     <form class="create" action="#"  enctype="multipart/form-data">
         <div class="error"></div>
         <div class="success"></div>
         <div class="images">
             <label for="productImage">Product Image</label>
             <div id="upload" >
                 <img src="" class="editimage" onClick="trigger()" id="profileDisplay" >
                 <input type="file" name="product_image" onchange="displayImage(this)"   id="capture"  style="display:none">
                 <i class="fa fa-camera" id="camera"></i>
             </div>
          </div>

      <div class="flex-inbox">
           <div class="inputbox-details">
               <label for="productName">Product Name</label>
               <input type="text" id="name" name="product_name"  placeholder="Product name" value='' autofocus >
           </div>

           <div class="inputbox-details">
               <label for="productPrice">Product Price</label>
              <input type="number" id="price" name="product_price" placeholder="Product price" value=''   autofocus >
           </div>
      </div>

          <div class="inputbox-details">
              <label for="productDescription">Product description</label>
              <textarea id="desc" name="product_description"  class="description" placeholder="Product description" autofocus  > </textarea>
          </div>

      <div class="flex-inbox"> 
      <div class="inputbox-details">
          <label for="productCategory">product Category</label>
          <select id="category" name="category">
          <?php 
           $stmt=$categoryInstance->getCategories();
           $categoryData=$stmt->fetchAll(PDO::FETCH_ASSOC);
           if($stmt->rowCount() > 0 ): 
           ?>   
            <?php foreach($categoryData as $categories): ?>
             <option value="<?php echo  "{$categories['name']}" ; ?> "><?php echo  "{$categories['name']}" ; ?> </option>
             <?php endforeach ?>
           <?php else: ?>  
              <option value="" >No category, create Now!</option> 
           <?php endif ?>
          </select>
         
      </div>

      <div class="inputbox-details">
          <label for="productAvailabilty"> Product Availablity </label>
          <select id="available" name="product_available">
             <!-- <option value="" disabled selected>Product's availability</option>   -->
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>

          </select>
      
      </div>
      </div>


      <div class="button-details">
         <input type="hidden"  name="admin" value="<?php echo $sessionid; ?> "  autofocus >
         <input type="hidden"  name="productid" id="productid" value=" "  autofocus >
         <button class="submit" name="login">Update</button>
      </div>

  </form>

</div>
</div>
           </div>
           </div>
   <!-------------------------------------- END OF MODAL UPDATE ----------------------------------------------------->
            

  


        </div> <!--- end of container -->
   </main>

           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/del-product.js"></script>
           <script src="../Resources/js/update-product.js"></script>
     </body>

</html>
