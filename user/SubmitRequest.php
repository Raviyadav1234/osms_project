<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
if($_SESSION['is_login']){
 $u_email = $_SESSION['u_email'];
} else {
 echo "<script> location.href='userlogin.php'; </script>";
}
if(isset($_POST['submit_request'])){
 // Checking for Empty Fields
 if(($_POST['request_info'] == "") || ($_POST['request_desc'] == "") || ($_POST['requester_name'] == "") || ($_POST['requester_add1'] == "") || ($_POST['requester_add2'] == "") || ($_POST['requester_city'] == "") || ($_POST['requester_state'] == "") || ($_POST['requester_pin'] == "") || ($_POST['requester_email'] == "") || ($_POST['requester_mobile'] == "") || ($_POST['request_date'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $req_info = $_POST['request_info'];
   $req_desc = $_POST['request_desc'];
   $req_name = $_POST['requester_name'];
   $req_add1 = $_POST['requester_add1'];
   $req_add2 = $_POST['requester_add2'];
   $req_city = $_POST['requester_city'];
   $req_state = $_POST['requester_state'];
   $req_pin = $_POST['requester_pin'];
   $req_email = $_POST['requester_email'];
   $req_mobile = $_POST['requester_mobile'];
   $req_date = $_POST['request_date'];
   $sql = "INSERT INTO tbl_submitrequest(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_pin, requester_email, requester_mobile, request_date) VALUES ('$req_info','$req_desc', '$req_name', '$req_add1', '$req_add2', '$req_city', '$req_state', '$req_pin', '$req_email', '$req_mobile', '$req_date')";
   if(mysqli_query($conn,$sql) == TRUE){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your' . $genid .' </div>';
    session_start();
    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'; </script>";
    // include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST">
    <div class="form-group">
      <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="request_info">
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="request_desc">
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="requester_name">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requester_add1">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requester_add2">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requester_city">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requester_state">
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Pin</label>
        <input type="text" class="form-control" id="inputZip" name="requester_pin" onkeypress="isInputNumber(event)">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requester_email">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requester_mobile" onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="request_date">
      </div>
    </div>

    <button type="submit" class="btn btn-outline-success" name="submit_request">Submit</button>
    <button type="reset" class="btn btn-outline-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
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
mysqli_close($conn);
?>