<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
if($_SESSION['is_login']){
 $u_email = $_SESSION['u_email'];
} else {
 echo "<script> location.href='userlogin.php'; </script>";
}
?>
<div class="col-sm-6 mt-5  mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-outline-success">Search</button>
  </form>
  <?php
  if(isset($_REQUEST['checkid'])){
  $checkid = $_REQUEST['checkid'];
    //Checkink Id for assignwork_tb
    $sql = "SELECT * FROM tbl_assignwork WHERE request_id = {$checkid}";
    //$result = $conn->query($sql);
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    //Checking Id for submitrequest_tb
     $sql1 = "SELECT * FROM tbl_submitrequest WHERE request_id = {$checkid}";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    if((@$row['request_id']) == $_REQUEST['checkid']){ ?>
  <h3 class="text-center mt-5">Assigned Work Details</h3>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Request ID</td>
        <td>
          <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Info</td>
        <td>
          <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Description</td>
        <td>
          <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td>
          <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 1</td>
        <td>
          <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 2</td>
        <td>
          <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
        </td>
      </tr>
      <tr>
        <td>Pin Code</td>
        <td>
          <?php if(isset($row['requester_pin'])) {echo $row['requester_pin']; } ?>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
        </td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td>
          <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
        </td>
      </tr>
      <tr>
        <td>Assigned Date</td>
        <td>
          <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
        </td>
      </tr>
      <tr>
        <td>Technician Name</td>
        <td>
          <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?>
        </td>
      </tr>
      <tr>
        <td>Customer Sign</td>
        <td></td>
      </tr>
      <tr>
        <td>Technician Sign</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class="text-center">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="work.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
  </div>
  <?php } elseif(@$row1['request_id'] !== $_REQUEST['checkid'] and @$row['request_id'] !== $_REQUEST['checkid']) {
      echo '<div class="alert alert-warning mt-4" role="alert">
      Please Enter a Valid Request Id </div>';
    }else{
      echo '<div class="alert alert-dark mt-4" role="alert">
      Your Request is Still Pendind </div>';
    }


 }
 ?>

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