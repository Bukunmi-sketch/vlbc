$("form.product-modify").on("submit",function(event){
    event.preventDefault();
});

let modal = document.querySelector(".modal");
let span = document.querySelector(".modal-header span.close");
span.onclick =()=>{
 modal.style.display = "none";
}
  

$('.justbtn').click(function(){ 
 
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
    $('.editimage').attr('src', folder + picture); 
    console.log("#eachmodal",productid);
    console.log("name", name);
    console.log("description", description);
    console.log("folder", folder + picture);
   $('.modal').css("display", "block");

  });  
  

$('.deletebtn').click(function(){ 

    var productid=$(this).data("productidentity");
    $post=$(this);
    
    $.ajax({  
    url:"../Controllers/deleteProductController.php",
    method:"POST",
    data:{productid:productid},
    success:function(data){
        // $ post.css("display","none"); 
          $("#eachproduct"+productid).css("display","none");        
        //  $(".liked-by"+productid).html(data +" "+"likes");          
		      					}
  		  });
    });  
   

