<?php
session_start();
ob_start();

include '../Includes/inc.php';
//include '../Includes/autoload.php';
include './auth/redirect.php';

$sessionid = $_SESSION['id'];
$userInfo = $userInstance->getuserinfo($sessionid);
$email = $userInfo['email'];
$firstname = $userInfo['firstname'];
$lastname = $userInfo['lastname'];
$registered_date = $userInfo['date'];

//$memberInstance = new User\Member($conn);

if (isset($_GET['read']) && ($_GET['read'] == 'true')) {
  $notifyInstance->readNotification();
}


?>

<!doctype html>
<html lang="en">

<head>
  <title>All members</title>
  <?php include '../Includes/metatags.php'; ?>

  <link rel="stylesheet" type="text/css" href="../Resources/css/left.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
  <link rel="stylesheet" type="text/css" href="../vendors/DataTables/datatables.min.css" />

</head>

<body>
  <?php include './components/header.php'; ?>
  <main>
    <div class="container">
      <?php
      include './components/left.php';

      $statement=$memberInstance->getMembers();
      $memberData=$statement->fetchAll(PDO::FETCH_ASSOC);


      $g=1;
      ?>
 

      <div class="middle">
        <?php if ($statement->rowCount() > 0) : ?>

          <h5> </h5>
          <form action="orders.php"></form>
       
          <div class="table-container">
            <table id="example">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th> Action </th>
                  <th>Members Name</th>
                  <th>Members Id</th>
                  <th>Members contact</th>
                  <th>Ministry</th>
                  <th>Department</th>
                  <th>Email</th>
                  <th>gender</th>
                  <th>Residence</th>
                  <th>Birthday</th>
                  <th>State of Origin</th>
                  <th>Previous Church</th>
                  <th>Registered Date</th>
                  <th>Time registered</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($memberData as $members) : ?>
                  <div>
                    <tr class="trr" id="eachorder<?php echo  "{$members['id']}"; ?>">
                    <td> <?php echo $g++; ?>   </td>
                      <form action="" class="order-modify">
                        <td>
                          <!--<button class="editbtn">Edit</button>--><button data-identity="<?php echo  "{$members['id']}"; ?>" class="deletebtn">Delete</button>
                        </td>
                      </form>                     
                      <td> <?php echo  "{$members['firstname']} {$members['lastname']}"; ?> </td>
                      <td> <?php echo  "{$members['rollid']}"; ?> </td>
                      <td> <?php echo  "{$members['mobile']}"; ?> </td>
                      <td> <?php echo  "{$members['ministry']}"; ?> </td>
                      <td> <?php echo  "{$members['department']}"; ?> </td>
                      <td> <?php echo  "{$members['email']}"; ?> </td>
                      <td> <?php echo  "{$members['gender']}"; ?> </td>
                      <td> <?php echo  "{$members['residence']}"; ?> </td>
                      <td> <?php echo  "{$members['birthday']}"; ?> </td>
                      <td> <?php echo  "{$members['origin']}"; ?> </td>
                      <td> <?php echo  "{$members['previous_church']}"; ?> </td>
                      <td> <?php echo date("D,F j Y",  strtotime($members['date'])); ?> </td>
                      <td> <?php echo date("H:i a",  strtotime($members['date'])); ?> </td>
                    </tr>
                  </div>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        

        <?php else : ?>
          <h4>No members have been registereed</h4>
        <?php endif ?>
      </div>






    </div>

  </main>

  <script src="../vendors/DataTables/datatables.min.js"></script>
  <script src="../vendors/pace/pace.min.js"></script>
  <script src="../vendors/lobipanel/lobipanel.min.js"></script>
  <script src="../vendors/iscroll/iscroll.js"></script>
  <script src="../vendors/prism/prism.js"></script>
  <script src="../Resources/js/sidebar.js"></script>
  <script src="../Resources/js/del-order.js"></script>

  <script>
    $(function($) {
      $('#example').DataTable();

      $('#example').DataTable({
     //   "scrollY": "300px",
      //  "scrollCollapse": true,
        "paging": true
      });

      $('#example3').DataTable();
    });

    function go2Page() {
      var page = document.getElementById("page").value;
      page = ((page > <?php echo $totalPages; ?>) ? <?php echo $totalPages; ?> : ((page < 1) ? 1 : page));
      window.location.href = 'orders.php?page=' + page;
    }
  </script>

</body>

</html>