<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['emp_update'])){
  // Checking for Empty Fields
  if(($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_city'] == "") || ($_REQUEST['emp_mobile'] == "") || ($_REQUEST['emp_email'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $emp_id = $_REQUEST['emp_id'];
    $emp_name = $_REQUEST['emp_name'];
    $emp_city = $_REQUEST['emp_city'];
    $emp_mobile = $_REQUEST['emp_mobile'];
    $emp_email = $_REQUEST['emp_email'];
  $sql = "UPDATE tbl_technician SET emp_name = '$emp_name', emp_city = '$emp_city', emp_mobile = '$emp_mobile', emp_email = '$emp_email' WHERE emp_id = '$emp_id'";
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
  <h3 class="text-center">Update Technician Details</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM tbl_technician WHERE emp_id = {$_REQUEST['id']}";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="empId">Emp ID</label>
      <input type="text" class="form-control" id="empId" name="emp_id" value="<?php if(isset($row['emp_id'])) {echo $row['emp_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="emp_name" value="<?php if(isset($row['emp_name'])) {echo $row['emp_name']; }?>">
    </div>
    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="emp_city" value="<?php if(isset($row['emp_city'])) {echo $row['emp_city']; }?>">
    </div>
    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="emp_mobile" value="<?php if(isset($row['emp_mobile'])) {echo $row['emp_mobile']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="emp_email" value="<?php if(isset($row['emp_email'])) {echo $row['emp_email']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-outline-success" id="empupdate" name="emp_update">Update</button>
      <a href="technician.php" class="btn btn-outline-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>