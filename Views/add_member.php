<?php
session_start();
ob_start();

error_reporting(1);

include '../Includes/inc.php';
include './auth/redirect.php';

$sessionid = $_SESSION['id'];
$userInfo = $userInstance->getuserinfo($sessionid);
$email = $userInfo['email'];
$firstname = $userInfo['firstname'];
$lastname = $userInfo['lastname'];
$registered_date = $userInfo['date'];

?>
<!doctype html>
<html lang="en">

<head>
    <title>Register member</title>
    <?php include '../Includes/metatags.php'; ?>

    <link rel="stylesheet" type="text/css" href="../Resources/css/left.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
</head>

<body>
    <?php include './components/header.php'; ?>
    <main>
        <div class="container">
            <?php include './components/left.php'; ?>
            <?php

            $sqlQuery = "SELECT rollid FROM members WHERE rollid !='' ORDER BY members.id DESC LIMIT 1";
            $stmt = $conn->prepare($sqlQuery);
            $stmt->execute();
            $returned_row = $stmt->FETCH(PDO::FETCH_ASSOC);

            if($stmt->rowCount() <= 0 ){
                $year = date("Y");
                $generatedId = "VLBC/$year/1000";
            }else{
            //get the last four no of the rollid
            $lastFour = substr($returned_row['rollid'], -4);
            //increment it by one
            $newRegNo = intval($lastFour) + 1;
          //  var_dump($newRegNo);
          //  die();
            
            $year = date("Y");
            $generatedId = "VLBC/$year/$newRegNo";
            }
            ?>

            <div class="middle">

                <div class="middle-heading">
                    <h3>Add New Members</h3>
                </div>
                <div class="max-sub-container">

                    <form class="create" action="#" enctype="multipart/form-data">
                  
                        <div class="success"></div>

                        <div class="first-flex-inbox">

                            <div class="images">
                                <label for="productImage">Member Image</label>
                                <div id="upload">
                                    <img src="" onClick="trigger()" id="profileDisplay">
                                    <input type="file" name="product_image" onchange="displayImage(this)" id="capture" style="display:none">
                                    <i class="fa fa-camera" id="camera"></i>
                                </div>
                            </div>

                            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="fname">Firstname</label>
                                    <input type="text" name="fname" placeholder="Firstname" value="  " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="lname">Lastname</label>
                                    <input type="text" name="lname" placeholder="Lastname" value=" " autofocus>
                                </div>

                            </div>

                            <div class="flex-triple-inbox">
                                <div class="inputbox-details">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Email" value=" " autofocus>
                                </div>


                                <div class="inputbox-details">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="number" name="mobile" placeholder="Phone Number" value=" " autofocus>
                                </div>


                                <div class="inputbox-details">
                                    <label for="rollid">Member ID</label>
                                    <input type="text" id="rollid" name="rollid" placeholder="Lastname" value="<?php echo $generatedId; ?>" autofocus readonly>
                                </div>
                            </div>

                        </div>


                        <div class="second-flex-inbox">

                            <div class="flex-triple-inbox">

                                <div class="inputbox-details">
                                    <label for="gender">Gender</label>
                                    <select name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                              
                                <div class="inputbox-details">
                                    <label for="origin">State of Origin</label>
                                    <input type="text" name="state_origin" placeholder="State of Origin" value=" " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="ministry">Ministry/Unit</label>
                                    <select name="ministry">
                                        <?php
                                        $stmt = $unitInstance->getunitMinistry();
                                        $unitData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        if ($stmt->rowCount() > 0) :
                                        ?>
                                            <?php foreach ($unitData as $unit) : ?>
                                                <option value="<?php echo  "{$unit['name']}"; ?> "><?php echo  "{$unit['name']}"; ?> </option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <option value="">No unit, create Now!</option>
                                        <?php endif ?>
                                    </select>
                                </div>


                            </div>

                            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="prevchurch">Previous Church</label>
                                    <input type="text" name="prev_church" placeholder="Previous church attended" value=" " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="unit">Unit</label>
                                    <select name="unit">
                                        <option value="Children">Children</option>
                                        <option value="Teenagers">Teenagers</option>
                                        <option value="Youth only">Youth only</option>
                                        <option value="WMU only">WMU only</option>
                                        <option value="MMU only">MMU only</option>
                                        <option value="WMU & Youth">WMU & Youth</option>
                                        <option value="MMU & Youth">MMU & Youth</option>
                                    </select>
                                </div>

                                                           
                            </div>
                    
                        <div class="flex-inbox">
                            <div class="inputbox-details">
                                    <label for="residence"> Residence Address</label>
                                    <input type="text" name="residence" placeholder="current residence address" value=" " autofocus>
                             </div>

                             <div class="inputbox-details">
                                    <label for="marital">House Fellowship</label>
                                    <select name="gender">
                                        <option value="Male">Married</option>
                                        <option value="Female">Single</option>
                                        <option value="Female">Divorced</option>
                                        <option value="Female">Widow</option>
                                    </select>
                                </div>
                        </div>       


                            <div class="flex-triple-inbox">

                            <div class="inputbox-details">
                                    <label for="marital">Marital Status</label>
                                    <select name="gender">
                                        <option value="Male">Married</option>
                                        <option value="Female">Single</option>
                                        <option value="Female">Divorced</option>
                                        <option value="Female">Widow</option>
                                    </select>
                                </div>
                                
                                <div class="inputbox-details">
                                    <label for="ministry">Birthday date</label>
                                    <select name="ministry">
                                        
                                            <?php for($i=1; $i <=31; $i++) : ?>
                                                <option value="<?php echo $i; ?> "><?php echo $i; ?> </option>
                                            <?php endfor ?>
                                       
                                    </select>

                                </div>   


                                <div class="inputbox-details">
                                    <label for="month">Month</label>
                                    <input type="month" name="birthday" placeholder="" value=" " autofocus>
                                </div>
                            </div>



                            <div class="error"></div>
                            <div class="button-details">
                                <input type="hidden" name="admin" value="<?php echo $sessionid; ?> " autofocus>
                                <button class="submit" name="login">Add Member</button>
                            </div>

                        </div>


                    </form>

                </div>
            </div>



        </div>
    </main>

    <script src="../Resources/js/add_member.js"></script>
    <script src="../Resources/js/sidebar.js"></script>

    <script type="text/javascript">
        function trigger(e) {
            document.querySelector("#capture").click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>

</html>