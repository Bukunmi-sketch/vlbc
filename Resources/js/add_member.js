

let imageValue= document.querySelector('#profileDisplay');
let capfiles= document.querySelector("#capture");
let textValue=document.querySelector("#passa");
let priceid=document.querySelector("#priceid");
let descid=document.querySelector("#descid");


        const forme=document.querySelector("form.create");
        const btn=document.querySelector("button.submit");
        const error=document.querySelector(".error");
        const successful=document.querySelector(".success");
              
         
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
                                   btn.textContent="posted successfully";
                                   textValue.value="";
                                   priceid.value="";
                                   descid.value="";
                                   imageValue.setAttribute('src', '');  
                                   capfiles.value='';                                       
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
                              btn.textContent="creating...";
                             }//DONE
                                   
                 }
                   
             xhr.open("POST","../Controllers/memberController.php",true);
             let formdata=new FormData(forme);
             xhr.send(formdata);
            }

