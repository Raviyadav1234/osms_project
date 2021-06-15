<?php
require_once __DIR__.'/config/dbConnection.php';

session_start();
if(!isset($_SESSION['is_login'])){
  if(isset($_POST['u_email'])){
    $u_email = mysqli_real_escape_string($conn,trim($_POST['u_email']));
    $u_password = mysqli_real_escape_string($conn,trim($_POST['u_password']));
    $sql = "SELECT user_email, user_password FROM tbl_userlogin WHERE user_email='".$u_email."' AND user_password='".$u_password."' limit 1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      
      $_SESSION['is_login'] = true;
      $_SESSION['u_email'] = $u_email;
      // Redirecting to userprofile page on Correct Email and Pass
      echo "<script> location.href='userprofile.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} else {
  echo "<script> location.href='userprofile.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">

  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
 <title>Login</title>
</head>

<body>
  <h1 class="text-center mt-5">Login Here</h1>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="u_email">
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name="u_password">
          </div>
          <button type="submit" class="btn btn-outline-success mt-3 btn-block shadow-sm font-weight-bold">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>