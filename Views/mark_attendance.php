<?php
session_start();
ob_start();

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
    <title>Mark Attendance</title>
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

            <div class="middle">

                <div class="middle-heading">
                    <h3>Mark Attendance</h3>
                </div>
                <div class="max-sub-container">

                    <form class="create" action="#" enctype="multipart/form-data">
                        <div class="error"></div>
                        <div class="success"></div>

                        <div class="first-flex-inbox">


                            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="fname">Firstname</label>
                                    <input type="text"  name="fname" placeholder="Firstname" value="  " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="lname">Lastname</label>
                                    <input type="text"  name="lname" placeholder="Lastname" value=" " autofocus>
                                </div>
                            </div>

                            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="number"  name="mobile" placeholder="Phone Number" value=" " autofocus>
                                </div>

                                <div class="inputbox-details">
                                    <label for="residence"> Residence Address</label>
                                    <input type="text"  name="residence" placeholder="current residence address" value=" " autofocus>
                                </div>
                            </div>

                           

                        </div>


                        <div class="second-flex-inbox">

                            <div class="flex-inbox">
                                <div class="inputbox-details">
                                    <label for="gender">Gender</label>
                                    <select name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="inputbox-details">
                                    <label for="prevchurch">Previous Church</label>
                                    <input type="text"  name="prev_church" placeholder="Previous church attended" value=" " autofocus>
                                </div>
                             
                            </div>

                            <div class="flex-inbox">

                               <div class="inputbox-details">
                                    <label for="gender">Become member (Join us)</label>
                                    <select name="gender">
                                        <option value="Male">Yes</option>
                                        <option value="Female">No</option>
                                    </select>
                                </div>


                                <div class="inputbox-details">
                                    <label for="origin">Worship Experience</label>
                                    <input type="text"  name="state_origin" placeholder="collect visitors worship experience" value=" " autofocus>
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