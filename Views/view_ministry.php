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
  <title>Ministry </title>
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
              <h4> View all Ministries </h4>
            </span>
          </div>

          <form action="#" method="POST">
            <div class="error"></div>
            <div class="inputbox-details">
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
  <script src="../Resources/js/viewministry.js"></script>
</body>

</html>