function showModal(Updateform){
    //MSK-00104
        
        var Id = $(Updateform).data("id");  
            
        var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start 1 
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //MSK-00107 
                    var myArray1 = eval( xhttp.responseText );
                    
                    document.getElementById("name").value =myArray1[0];
                    document.getElementById("price").value =myArray1[1];
                    document.getElementById("desc").value =myArray1[2];
                   
                }
                
              };	
            
        xhttp.open("GET", "../model/get_grade.php?id=" + Id , true);												
          xhttp.send();//MSK-00105-Ajax End
         
    };