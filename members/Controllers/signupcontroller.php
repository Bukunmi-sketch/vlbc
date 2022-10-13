<?php
    
   
  include '../Models/User.php';  
  include '../Models/Login.php';  
  include '../Models/Register.php';  
  include '../Models/Auth.php';  
  //include 'c:/xampp/htdocs/websites/Afrimama/Models/Uploadimg.php';  
   
   
   
      // create of object of the user classs
    $authInstance= new Auth($conn);
    $userInstance= new User($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    //$imgInstance= new Uploadimg($conn);
 
   



    $firstname='';
    $lastname='';
    $country="";
    $email='';
    $password='';
    $confirmpass="";
    $secretkey="";
    $defaultkey="vlbc--";


   if($_SERVER['REQUEST_METHOD']=="POST"){

    
       $type=$_POST["action"];
       if($type=="first_reg"){
    
           // $authInstance= new User($conn);
    
            $firstname=$authInstance->validate(ucfirst($_POST['fname']));
            $lastname=$authInstance->validate(ucfirst($_POST['lname']));
            $email=$authInstance->validate(ucfirst($_POST['email']));
            $password=strtolower($_POST['password']);
            $confirmpass=strtolower($_POST['confirmpass']);
            $userkey=strtolower($_POST['secretkey']);
            $date=date('y-m-d');
            $type="SIGNUP";
            $read_msg="UNREAD";
            $time=date("h:i:sa");
            
            
            if( !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpass) && !empty($userkey) ){
                if($authInstance->validLetters($firstname)){
                    if($authInstance->validLetters($lastname)){
                      //function to check invalid email
                        if($authInstance->filteremail($email)){
                            //funtion to check if email has been used;
                              if($registerInstance->RegisterCheckemail($email)){
                                  //function to check if password is longer than 6
                                   if($authInstance->passwordlength($password)){
                                         //function to check if confirmpassword & password matches
                                          if($authInstance->matchpassword($password,$confirmpass)){
                                              //function for secretKey
                                              if($authInstance->secretKey($defaultkey,$userkey)){
                                              //function to register the user
                                               if($registerInstance->register($firstname, $lastname, $email, $password, $date)){
                                                    if($data=$registerInstance->fectchRegistedDetails($email)){
                                                          //define session if login was succesful with returned user data
                                                          session_start();
                                                          $_SESSION['email']=$data['email'];
                                                          $_SESSION['firstname']=$data['firstname'];
                                                          $_SESSION['lastname']=$data['lastname'];
                                                          $_SESSION['id']=$data['id'];
                                                          $_SESSION["lastactivity"]=time();  
                                                          $_SESSION['loggedin']=true; 
                                                          $_SESSION['lastactivetime']=date("h:i:sa"); 
                                                          $_SESSION['lastactivedate']=date("y-m-d");              
                                                          $_SESSION['datelastactivity']=date('y-m-d h:i:s');  
                                                          $ipaddress=$_SERVER['REMOTE_ADDR'];
                                                          $browsertype=$_SERVER['HTTP_USER_AGENT'];

                                                        //  $loginInstance->lastActivity($_SESSION['id'],$_SESSION["lastactivity"], $_SESSION['lastactivetime'], $_SESSION//['lastactivedate'],$_SESSION['datelastactivity']);                                                 
                                                          $loginInstance->usersLogData($_SESSION["id"],$ipaddress, $browsertype);
                                                              
                                                                     echo "success";                                                               
          
                                                    }else{
                                                          echo 'we could nt sign u in';
                                                    }                                                                              
                                               }else{
                                                   echo "an error occurred while attempting to sign up";
                                               }
                                            }else{
                                                echo "access denied";
                                            }
                                          }else{
                                              echo "password does not match";
                                          }
                                   }else{
                                       echo "password is too short";
                                   }
                              }else{
                                  echo "oops this email has been used";
                              }
                        }else{
                            echo "invalid email address";
                        }
                    }else{
                       echo "Only letters and white space allowed  in lastname";  
                    }    
                }else{
                    echo "Only letters and white space allowed in firstname";
                }
    
            }else{
                echo "all fields are required to be filled";
            }
  
  }
   
}







?>