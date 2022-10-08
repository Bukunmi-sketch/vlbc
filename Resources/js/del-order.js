$("form.order-modify").on("submit",function(event){
    event.preventDefault();
});
/*
let modal = document.querySelector(".modal");
let span = document.querySelector(".modal-header span.close");
span.onclick =()=>{
 modal.style.display = "none";
}
*/  
/*
$('.editbtn').click(function(){ 
 
    var productid=$(this).data("id");
    var name=$(this).data("productname");
    var description=$(this).data("description");
    var picture=$(this).data("picture");
    var price=$(this).data("price");
    var available=$(this).data("available");
    var category=$(this).data("category");
    var folder=$(this).data('directory');
    $post=$(this);
 //   $("#eachmodal"+productid).css("display","block"); 

    $('#id').val(productid); 
    $('#name').val(name); 
    $('#desc').val(description); 
    $('#price').val(price); 
   // $('#category').val(category); 
   // $('#available').val(available); 
   //$('#capture').val(picture)
    $('#productid').val(productid); 
    //$('.editimage').attr('src', folder + picture); 
    console.log("#eachmodal",productid);
    console.log("name", name);
    console.log("description", description);
    console.log("folder", folder + picture);
   $('.modal').css("display", "block");

  });  
*/  

$('.deletebtn').click(function(){ 

    var orderid=$(this).data("identity");
    $post=$(this);
    
    $.ajax({  
    url:"../Controllers/deleteOrderController.php",
    method:"POST",
    data:{orderid:orderid},
    success:function(data){
          $("#eachorder"+orderid).css("display","none");             
		      					}
  		  });
    });  

    $('.markbtn').click(function(){ 

      var orderid=$(this).data("identity");
      $post=$(this);
      
      $.ajax({  
      url:"../Controllers/markController.php",
      method:"POST",
      data:{orderid:orderid},
      success:function(data){
            $("#eachmark"+orderid).html(data);
            console.log(data);                
                      }
          });
      });  
   
