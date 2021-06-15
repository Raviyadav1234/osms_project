<?php
define('TITLE', 'Add New Requester');
define('PAGE', 'requesters');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['req_submit'])){
 // Checking for Empty Fields
 if(($_REQUEST['user_name'] == "") || ($_REQUEST['user_email'] == "") || ($_REQUEST['user_password'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $user_name = $_REQUEST['user_name'];
   $user_email = $_REQUEST['user_email'];
   $user_password = $_REQUEST['user_password'];
   $sql = "INSERT INTO tbl_userlogin (user_name, user_email, user_password) VALUES ('$user_name', '$user_email', '$user_password')";
   if(mysqli_query($conn,$sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
   }
 }
 }
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Requester</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="r_name">Name</label>
      <input type="text" class="form-control" id="r_name" name="user_name">
    </div>
    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="email" class="form-control" id="r_email" name="user_email">
    </div>
    <div class="form-group">
      <label for="r_password">Password</label>
      <input type="password" class="form-control" id="r_password" name="user_password">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-outline-success" id="reqsubmit" name="req_submit">Submit</button>
      <a href="requester.php" class="btn btn-outline-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>

<?php
include('includes/footer.php'); 
?>