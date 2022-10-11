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

$name = $firstname . $lastname;

//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">

<head>
  <title>View Announcement</title>
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
       

        <?php
        $stmt = $announceInstance->getActiveAnnouncement();
        $announceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <?php if ($stmt->rowCount() > 0) : ?>


          <div class="table-container">
            <table>
              <tr>
                <th>Manage</th>
                <th>FOR</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>IMG</th>
              </tr>
              <?php foreach ($announceData as $announce) : ?>
                <tr>
                  <td> <button class="deletebtn"> Delete </button></td>
                  <td> <?php echo  "{$announce['typefor']}"; ?> </td>
                  <td> <?php echo  "{$announce['title']}"; ?> </td>
                  <td> <?php echo  "{$announce['content']}"; ?> </td>
                  <td> <?php echo date("D,F j Y",  strtotime($announce['date'])); ?> </td>
                  <td> <?php echo date("h i sa",  strtotime($announce['date'])); ?> </td>
                </tr>
              <?php endforeach ?>
            </table>

          <?php else : ?>
            <div class="no-value" style="text-align:center">
              <h4>you have not created any announcement</h4>
            </div>
          <?php endif ?>

          </div>

      </div>



    </div>
  </main>
  <script src="../Resources/js/app.js"></script>
  <script src="../Resources/js/sidebar.js"></script>
  <script src="../Resources/js/createannounce.js"></script>

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