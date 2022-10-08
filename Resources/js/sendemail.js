
        const forme=document.querySelector("form");
        const btn=document.querySelector("button.submit");
        const error=document.querySelector(".error");
        let textValue=document.querySelector("input[type=text]");    
         
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
                             
                             let data=xhr.responseText;                            
                             if(data == "success"){
                                   error.style.display="none";
                                   btn.textContent="created succesfully";
                                   textValue.value="";                                      
                             }
                              else{  
                               // error.innerHTML="you can't create an empty product";
                                error.style.display="block";
                                error.textContent=data;
                                btn.innerHTML="Try again";                                                   
                                 }
                        }    //STATUS ===200
                     } //DONE
                             else{
                              btn.textContent="sending...";
                             }//DONE
                                   
                 }
                   
             xhr.open("POST","../email/send.php",true);
             let formdata=new FormData(forme);
             xhr.send(formdata);
            }

