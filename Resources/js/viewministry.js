
        const forme=document.querySelector("form");
        const btn=document.querySelector("button.submit");
        const error=document.querySelector(".error"); 
        let result=document.querySelector(".result-box");    
         
        forme.onsubmit=(e)=>{
            e.preventDefault();
        }
         
         
         btn.onclick=()=>{
            
            let xhr="";
            if(window.XMLHttpRequest){
                xhr=new XMLHttpRequest();
            }
            else{
            xhr=new ActiveXObject("Microsoft.XMLHTTP");
            }
              
              xhr.onreadystatechange=()=>{
                 if(xhr.readyState===XMLHttpRequest.DONE){
                      if(xhr.status===200){
                             console.log(xhr);
                             let data=xhr.responseText;
                             console.log(data);                           
                           //  if(data === "success"){ 
                                   error.style.display="none";
                                   btn.textContent="result listed";
                                   result.innerHTML=data;                                                                   
                            } else{   
                                error.style.display="block";
                                error.textContent=data;
                                btn.innerHTML="Try again";                                                   
                                 }   //STATUS ===200
                     } //DONE
                             else{
                              btn.textContent="creating...";
                             }//DONE
                                   
                 }
                   
             xhr.open("POST","../Controllers/ministryviewController.php",true);
             let formdata=new FormData(forme);
             xhr.send(formdata);
            }

