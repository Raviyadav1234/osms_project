<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

if(session_id() == '') {
  session_start();
}
if(isset($_SESSION['is_adminlogin'])){
 $aEmail = $_SESSION['aEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
}
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM tbl_submitrequest WHERE request_id = {$_REQUEST['id']}";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_REQUEST['assign'])){
  // Checking for Empty Fields
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['request_desc'] == "") || ($_REQUEST['requester_name'] == "") || ($_REQUEST['requester_add1'] == "") || ($_REQUEST['requester_add2'] == "") || ($_REQUEST['requester_city'] == "") || ($_REQUEST['requester_state'] == "") || ($_REQUEST['requester_pin'] == "") || ($_REQUEST['requester_email'] == "") || ($_REQUEST['requester_mobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['assigndate'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $req_id = $_REQUEST['request_id'];
    $req_info = $_REQUEST['request_info'];
    $req_desc = $_REQUEST['request_desc'];
    $req_name = $_REQUEST['requester_name'];
    $req_add1 = $_REQUEST['requester_add1'];
    $req_add2 = $_REQUEST['requester_add2'];
    $req_city = $_REQUEST['requester_city'];
    $req_state = $_REQUEST['requester_state'];
    $req_pin = $_REQUEST['requester_pin'];
    $req_email = $_REQUEST['requester_email'];
    $req_mobile = $_REQUEST['requester_mobile'];
    $assigntech = $_REQUEST['assigntech'];
    $req_date = $_REQUEST['assigndate'];
    $sql = "INSERT INTO tbl_assignwork (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES ('$req_id', '$req_info','$req_desc', '$req_name', '$req_add1', '$req_add2', '$req_city', '$req_state', '$req_pin', '$req_email', '$req_mobile', '$assigntech', '$req_date')";
    if(mysqli_query($conn,$sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
    }
  }
  }
 // Assign work Order Request Data going to submit and save on db assignwork_tb table [END]
 ?>
<div class="col-sm-5 mt-5 jumbotron">
  <!-- Main Content area Start Last -->
  <form action="" method="POST">
    <h5 class="text-center">Assign Work Order Request</h5>
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="request_info">Request Info</label>
      <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>">
    </div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <input type="text" class="form-control" id="requestdesc" name="request_desc" value="<?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?>">
    </div>
    <div class="form-group">
      <label for="requestername">Name</label>
      <input type="text" class="form-control" id="requestername" name="requester_name" value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Address Line 1</label>
        <input type="text" class="form-control" id="address1" name="requester_add1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="address2">Address Line 2</label>
        <input type="text" class="form-control" id="address2" name="requester_add2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">City</label>
        <input type="text" class="form-control" id="requestercity" name="requester_city" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">State</label>
        <input type="text" class="form-control" id="requesterstate" name="requester_state" value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterzip">Pin</label>
        <input type="text" class="form-control" id="requesterpin" name="requester_pin" value="<?php if(isset($row['requester_pin'])) { echo $row['requester_pin']; } ?>"
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requester_email" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requester_mobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>"
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="assigntech">Assign to Technician</label>
        <input type="text" class="form-control" id="assigntech" name="assigntech">
      </div>
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="assigndate">
      </div>
    </div>
    <div class="float-right">
      <button type="submit" class="btn btn-outline-success" name="assign">Assign</button>
      <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>