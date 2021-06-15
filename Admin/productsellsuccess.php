<?php
session_start();
define('TITLE', 'Success');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }

$sql = "SELECT * FROM tbl_customer WHERE customer_id = {$_SESSION['myid']}";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 1){ 
 $row = mysqli_fetch_assoc($result);
 echo "<div class='ml-5 mt-5'>
 <h3 class='text-center'>Customer Bill</h3>
 <table class='table'>
  <tbody>
  <tr>
    <th>Customer ID</th>
    <td>".$row['customer_id']."</td>
  </tr>
   <tr>
     <th>Customer Name</th>
     <td>".$row['customer_name']."</td>
   </tr>
   <tr>
     <th>Address</th>
     <td>".$row['customer_address']."</td>
   </tr>
   <tr>
   <th>Product</th>
   <td>".$row['customer_product_name']."</td>
  </tr>
   <tr>
    <th>Quantity</th>
    <td>".$row['customer_product_quantity']."</td>
   </tr>
   <tr>
    <th>Price Each</th>
    <td>".$row['customer_product_each']."</td>
   </tr>
   <tr>
    <th>Total Cost</th>
    <td>".$row['customer_product_total']."</td>
   </tr>
   <tr>
   <th>Date</th>
   <td>".$row['customer_product_date']."</td>
  </tr>
   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
    <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td>
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