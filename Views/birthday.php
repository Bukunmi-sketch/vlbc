<?php
session_start();
//ob_start();

include '../Includes/inc.php';
include './auth/redirect.php';

$sessionid = $_SESSION['id'];
$userInfo = $userInstance->getuserinfo($sessionid);
$email = $userInfo['email'];
$firstname = $userInfo['firstname'];
$lastname = $userInfo['lastname'];
$registered_date = $userInfo['date'];

$name = $firstname . $lastname;

?>
<!doctype html>
<html lang="en">

<head>
    <title>View Birthday Celebrants</title>
    <?php include '../Includes/metatags.php'; ?>

    <link rel="stylesheet" type="text/css" href="../Resources/css/left.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
</head>

<body>
    <?php include './components/header.php'; ?>
    <main>
        <div class="container">
            <?php include './components/left.php'; ?>

            <div class="middle">
                <div class="min-sub-container">
                    <div class="spanheader">
                        <span>
                            <h4> View Birthday Celebrants </h4>
                        </span>
                    </div>

                    <form action="#" method="POST">
                        <div class="error"></div>
                        <div class="inputbox-details">
                            <label for="month">Birthday Month</label>

                            <?php
                            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            ?>
                            <select name="birthmonth">
                                <?php foreach ($months as $month) : ?>
                                    <option value="<?php echo $month; ?> "><?php echo $month; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="button-details">
                            <button class="submit" name="create">View</button>
                            <input type="hidden" name="creator_name" value=<?php echo $name; ?>>
                            <input type="hidden" name="creator_id" value=<?php echo $sessionid; ?>>
                        </div>

                    </form>

                </div>

                <div class="result-box">

                </div>


            </div>

        </div>
    </main>
    <script src="../Resources/js/app.js"></script>
    <script src="../Resources/js/sidebar.js"></script>
    <script src="../Resources/js/viewbirthday.js"></script>
</body>

</html>