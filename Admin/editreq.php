<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['user_id'] == "") || ($_REQUEST['user_name'] == "") || ($_REQUEST['user_email'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
   $user_id = $_REQUEST['user_id'];
   $user_name = $_REQUEST['user_name'];
   $user_email = $_REQUEST['user_email'];


  $sql = "UPDATE tbl_userlogin SET user_id = '$user_id', user_name = '$user_name', user_email = '$user_email' WHERE user_id = '$user_id'";
    if(mysqli_query($conn,$sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Requester Details</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM tbl_userlogin WHERE user_id = {$_REQUEST['id']}";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="r_login_id">Requester ID</label>
      <input type="text" class="form-control" id="r_login_id" readonly name="user_id" value="<?php if(isset($row['user_id'])) {echo $row['user_id']; }?>">
    </div>
    <div class="form-group">
      <label for="r_name">Name</label>
      <input type="text" class="form-control" id="r_name" name="user_name" value="<?php if(isset($row['user_name'])) {echo $row['user_name']; }?>">
    </div>
    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="text" class="form-control" id="r_email" name="user_email" value="<?php if(isset($row['user_email'])) {echo $row['user_email']; }?>">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="req_update" name="requpdate">Update</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>

<?php
include('includes/footer.php'); 
?>