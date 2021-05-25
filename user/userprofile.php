<?php
define('TITLE', 'User Profile');
define('PAGE', 'userprofile');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

 session_start();
 if($_SESSION['is_login']){
  $u_email = $_SESSION['u_email'];
 } else {
  echo "<script> location.href='userlogin.php'; </script>";
 }

 $sql = "SELECT * FROM tbl_userlogin WHERE user_email='$u_email'";
$result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result) == 1){
 $row = mysqli_fetch_assoc($result);
 $u_name = $row["user_name"]; 
}

 if(isset($_REQUEST['name_update'])){
  if(($_REQUEST['u_name'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $u_name = $_REQUEST["u_name"];
   $sql = "UPDATE tbl_userlogin SET user_name = '$u_name' WHERE user_email = '$u_email'";
   if(mysqli_query($conn,$sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
?>
<div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST">
    <div class="form-group">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" value=" <?php echo $u_email ?>" readonly>
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" name="u_name" value=" <?php echo $u_name ?>">
    </div>
    <button type="submit" class="btn btn-outline-success" name="name_update">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>