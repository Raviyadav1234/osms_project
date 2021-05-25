<?php
require_once '../dbConnection.php';

  if(isset($_POST['u_signup'])){
    // Checking for Empty Fields
    if(($_POST['u_name'] == "") || ($_POST['u_email'] == "") || ($_POST['u_password'] == "")){
      $registermsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
      $u_email = $_POST['u_email'];
    } else {
      $sql = "SELECT user_email FROM tbl_userlogin WHERE user_email = {$u_email}";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) == 1){
        $registermsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $u_name = $_POST['u_name'];
        $u_email = $_POST['u_email'];
        $u_password = $_POST['u_password'];
        $sql = "INSERT INTO tbl_userlogin(user_name, user_email, user_password) VALUES ('$u_name','$u_email', '$u_password')";
        if(mysqli_query($conn,$sql) == TRUE){
          $registermsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $registermsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
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

<div class="container pt-5" id="registration">
  <h2 class="text-center">Register Here</h2>
  <div class="row mt-4 mb-4">
    <div class="col-sm-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><input type="text"
            class="form-control" placeholder="Name" name="u_name">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="u_email">
          <small>we never share your email with anyone.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
            Password</label><input type="password" class="form-control" placeholder="Password" name="u_password">
        </div>
        <button type="submit" class="btn btn-outline-success mt-5 btn-block shadow-sm font-weight-bold" name="u_signup">Sign Up</button>
        <i style="font-size: 12px;">after sign-up you will be able to access all services.</i>
        <?php if(isset($registermsg)) {echo $registermsg; } ?>
      </form>

      <div class="row">
        <div class="class-sm-3 ml-3"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="userlogin.php">Continue with Login</a></div>

        <div class="class-sm-3 mt-4 ml-3">OR</div>
       
      <div class="class-sm-3 ml-3"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back to Home</a></div>
      </div>

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