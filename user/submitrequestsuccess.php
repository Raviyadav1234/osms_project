<?php
define('TITLE', 'Success');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
if($_SESSION['is_login']){
 $u_email = $_SESSION['u_email'];
} else {
 echo "<script> location.href='userlogin.php'; </script>";
}
$sql = "SELECT * FROM tbl_submitrequest WHERE request_id = {$_SESSION['myid']}";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 1){
 $row = mysqli_fetch_assoc($result);
 echo "<div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
   <tr>
     <th>Request ID</th>
     <td>".$row['request_id']."</td>
   </tr>
   <tr>
     <th>Name</th>
     <td>".$row['requester_name']."</td>
   </tr>
   <tr>
   <th>Email ID</th>
   <td>".$row['requester_email']."</td>
  </tr>
   <tr>
    <th>Request Info</th>
    <td>".$row['request_info']."</td>
   </tr>
   <tr>
    <th>Request Description</th>
    <td>".$row['request_desc']."</td>
   </tr>

   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>
 ";


} else {
  echo "Failed";
}
?>


<?php
include('includes/footer.php'); 
mysqli_close($conn);
?>