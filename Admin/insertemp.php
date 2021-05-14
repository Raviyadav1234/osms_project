<?php
define('TITLE', 'Add New Technician');
define('PAGE', 'technician');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['emp_submit'])){
 // Checking for Empty Fields
 if(($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_city'] == "") || ($_REQUEST['emp_mobile'] == "") || ($_REQUEST['emp_email'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
    $emp_name = $_REQUEST['emp_name'];
    $emp_city = $_REQUEST['emp_city'];
    $emp_mobile = $_REQUEST['emp_mobile'];
    $emp_email = $_REQUEST['emp_email'];
   $sql = "INSERT INTO tbl_technician (emp_name, emp_city, emp_mobile, emp_email) VALUES ('$emp_name', '$emp_city','$emp_mobile', '$emp_email')";
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
  <h3 class="text-center">Add New Technician</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="emp_name">
    </div>
    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="emp_city">
    </div>
    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="emp_mobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="emp_email">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="emp_submit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
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