<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $admin_email = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 $aEmail = $_SESSION['aEmail'];
 if(isset($_REQUEST['pass_update'])){
  if(($_REQUEST['admin_password'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM tbl_adminlogin WHERE admin_email='$admin_email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
     $admin_password = $_REQUEST['admin_password'];
     $sql = "UPDATE tbl_adminlogin SET admin_password = '$admin_password' WHERE admin_email = '$admin_email'";
      if(mysqli_query($conn,$sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
}
?>
<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" value=" <?php echo $admin_email ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="admin_password">
        </div>
        <button type="submit" class="btn btn-outline-success mr-4 mt-4" name="pass_update">Update</button>
        <button type="reset" class="btn btn-outline-secondary mt-4">Reset</button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>