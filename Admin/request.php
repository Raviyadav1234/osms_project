<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-4 mb-5">
  <!-- Main Content area start Middle -->
  <?php 
 $sql = "SELECT request_id, request_info, request_desc, request_date FROM tbl_submitrequest";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
   echo '<div class="card mt-5 mx-5">';
   echo '<div class="card-header">';
   echo 'Request ID : '. $row['request_id'];
   echo '</div>';
   echo '<div class="card-body">';
   echo '<h5 class="card-title">Request Info : ' . $row['request_info'] . '</h5>';
   echo '<p class="card-text">' . $row['request_desc'] . '</p>';
   echo '<p class="card-text">Request Date: ' . $row['request_date'] . '</p>';
   echo '<div class="float-right">';
   echo '<form action="" method="POST"> <input type="hidden" name="id" value='. $row["request_id"] .'><input type="submit" class="btn btn-outline-success mr-3" name="view" value="View"><input type="submit" class="btn btn-outline-secondary" name="close" value="Close"></form>';
   echo '</div>' ;
   echo '</div>' ;
   echo'</div>';
  }
 } else {
  echo '<div class="alert alert-info mt-5 col-sm-6" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully assigned all Requests.</p>
  <hr>
  <h5 class="mb-0">No Pending Requests</h5>
</div>';
 }

// after assigning work we will delete data from submitrequesttable by pressing close button
if(isset($_REQUEST['close'])){

  $request_id = $_REQUEST['id'];
  
  $sql = "DELETE FROM tbl_submitrequest WHERE request_id = {$request_id}";
  if(mysqli_query($conn,$sql) === TRUE){
    // echo "Record Deleted Successfully";
    // below code will refresh the page after deleting the record
    echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
 ?>
</div> <!-- Main Content area End Middle -->

<?php 
  include('assignworkform.php');
  include('includes/footer.php'); 
  mysqli_close($conn);
?>