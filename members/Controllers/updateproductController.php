<?php

include '../Models/Product.php';
include '../Models/Uploadimg.php';
include '../Models/Auth.php';

//$loginInstance= new Login($conn);  
$imgInstance= new Uploadimg($conn);
$productInstance=new Product($conn);
$authInstance=new Auth($conn);

$product_name="";
$description="";
$price="";
$category="";
$available="";
$date="";
$picture="";

if($_SERVER['REQUEST_METHOD']=="POST"){


    $product_name=$authInstance->validate($_POST['product_name']);
    $description=$authInstance->validate($_POST['product_description']);
    $price=$authInstance->validate($_POST['product_price']);
    $category=$authInstance->validate($_POST['category']);
    $available=$authInstance->validate($_POST['product_available']);
    $date=date("y-m-d h:ia");
   // $admin_id=$_POST['admin'];
    $productid=$_POST['productid'];
    
    $picture=$_FILES['product_image']["name"];
    $dpsize=$_FILES['product_image']['size'];
    $dptemp=$_FILES['product_image']['tmp_name']; 
    $dir="../Images/product-img/";
    $dirfile=$dir.basename($picture);

  /* if(empty($product_name)){
        echo "product_name cannot be empty";
    }
    if(empty($price)){
        echo "price cannot be empty";
    }
    if(empty($description)){
        echo "description cannot be empty";
    }
    if(empty($category)){
        echo "category cannot be empty";
    }
    if(empty($available)){
        echo "available cannot be empty";
    }
   
    if(empty($picture)){
        echo "picture cannot be empty";
    }
    
 */

    if(!empty($product_name) && !empty($price) && !empty($description) && !empty($category) && !empty($available) && !empty($picture) ){
      //  if($productInstance->IfProductExisted($product_name)){ 
          
                   if($imgInstance->imgextension($picture)){
                     if($imgInstance->largeImage($dpsize)){
                         if($imgInstance->moveImage($dptemp, $dirfile)){
                             if(  $productInstance->updateProducts($productid, $picture, $product_name, $description, $category, $price, $available) ){
                            
                                echo "success";
                            }else{
                                echo "an error occurred while uploading the image";
                            }
                         }else{
                             echo "file failed to move";
                         }
                     }else{
                         echo "image is too large";
                     }     
              }else{
                 echo 'file is not an image';
              }
    /*    }else{
            echo "product type already existed";
        }   */
     }elseif(!empty($product_name) && !empty($price) && !empty($description) && !empty($category) && !empty($available) && empty($picture) ){
        if(  $productInstance->updateWithoutPics($productid, $product_name, $description, $category, $price, $available) ){                            
            echo "success";
        }else{
            echo "an error occurred while updating this product";
        }
     }else{
        echo 'products details must be totally filled';
     }





}



?>