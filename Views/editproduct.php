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


     $getProductid= $_GET['id'];
     $productInfo= $productInstance->getProductInfo($getProductid);

     $productid = $productInfo['id'];
     $product_name = $productInfo['product_name'];
     $description=   $productInfo['description'];  
     $category =   $productInfo['category'];
     $price =      $productInfo['price'];
     $product_picture = $productInfo['product_picture'];
     $available = $productInfo['available'];
   
   
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
              <link rel="stylesheet" type="text/css" href="../Resources/css/modal.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
       
        <div class="middle">

<div class="min-sub-container" style="display:none; position:relative;">
     
       <div class="spanheader">
           <span><h4> Edit this product </h4></span>
       </div>

       <form class="create" action="#"  enctype="multipart/form-data">
           <div class="error"></div>

           <div class="images">
               <label for="productImage">Product Image</label>
               <div id="upload" >
                   <img src="<?php echo $dirfile; ?><?php echo $product_picture; ?>" onClick="trigger()" id="profileDisplay" >
                   <input type="file" name="product_image" onchange="displayImage(this)"   id="capture"  style="display:none">
                   <i class="fa fa-camera" id="camera"></i>
               </div>
            </div>

        <div class="flex-inbox">
             <div class="inputbox-details">
                 <label for="productName">Product Name</label>
                 <input type="text" id="passa" name="product_name"  placeholder="Product name" value=<?php echo $product_name; ?> autofocus >
             </div>

             <div class="inputbox-details">
                 <label for="productPrice">Product Price</label>
                <input type="number" id="passa" name="product_price" placeholder="Product price" value=<?php echo $price; ?>   autofocus >
             </div>
        </div>

            <div class="inputbox-details">
                <label for="productDescription">Product description</label>
                <textarea id="passa" name="product_description"  class="description" placeholder="Product description" autofocus  > <?php echo $product_name; ?></textarea>
            </div>

        <div class="flex-inbox"> 
        <div class="inputbox-details">
            <label for="productCategory">product Category</label>
            <select name="category">
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
            <select name="product_available">
               <!-- <option value="" disabled selected>Product's availability</option>   -->
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>

            </select>
        
        </div>
        </div>


        <div class="button-details">
           <input type="hidden"  name="admin" value="<?php echo $sessionid; ?> "  autofocus >
           <button class="submit" name="login">Add</button>
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
