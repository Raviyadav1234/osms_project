<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['product_submit'])){
 // Checking for Empty Fields
 if(($_REQUEST['product_name'] == "") || ($_REQUEST['product_dop'] == "") || ($_REQUEST['product_available'] == "") || ($_REQUEST['product_total'] == "") || ($_REQUEST['product_originalcost'] == "") || ($_REQUEST['product_sellingcost'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  // Assigning User Values to Variable
  $pname = $_REQUEST['product_name'];
  $pdop = $_REQUEST['product_dop'];
  $pava = $_REQUEST['product_available'];
  $ptotal = $_REQUEST['product_total'];
  $poriginalcost = $_REQUEST['product_originalcost'];
  $psellingcost = $_REQUEST['product_sellingcost'];
   $sql = "INSERT INTO tbl_assets (product_name, product_dop, product_available, product_total, product_originalcost, product_sellingcost) VALUES ('$pname', '$pdop','$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
   if(mysqli_query($conn,$sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
   }
 }
 }
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Product</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="product_name">
    </div>
    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="product_dop">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="product_available" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="product_total" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="product_originalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="product_sellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="product_submit">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
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