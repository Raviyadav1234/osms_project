<?php
define('TITLE', 'Change Password');
define('PAGE', 'userchangepass');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
if($_SESSION['is_login']){
 $u_email = $_SESSION['u_email'];
} else {
 echo "<script> location.href='userlogin.php'; </script>";
}

 $u_email = $_SESSION['u_email'];
 if(isset($_REQUEST['pass_update'])){
  if(($_REQUEST['u_password'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM tbl_userlogin WHERE user_email='$u_email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
     $u_password = $_REQUEST['u_password'];
     $sql = "UPDATE tbl_userlogin SET user_password = '$u_password' WHERE user_email = '{$u_email}'";
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
      <form class="mt-5 mx-5" method="POST">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" value=" <?php echo $u_email ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="u_password">
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