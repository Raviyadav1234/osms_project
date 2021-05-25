<?php    
define('TITLE', 'Update Product');
define('PAGE', 'assets');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['product_update'])){
  // Checking for Empty Fields
  if(($_REQUEST['product_name'] == "") || ($_REQUEST['product_dop'] == "") || ($_REQUEST['product_available'] == "") || ($_REQUEST['product_total'] == "") || ($_REQUEST['product_originalcost'] == "") || ($_REQUEST['product_sellingcost'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
  $pid = $_REQUEST['product_id'];
  $pname = $_REQUEST['product_name'];
  $pdop = $_REQUEST['product_dop'];
  $pava = $_REQUEST['product_available'];
  $ptotal = $_REQUEST['product_total'];
  $poriginalcost = $_REQUEST['product_originalcost'];
  $psellingcost = $_REQUEST['product_sellingcost'];
  $sql = "UPDATE tbl_assets SET product_name = '$pname', product_dop = '$pdop', product_available = '$pava', product_total = '$ptotal', product_originalcost = '$poriginalcost', product_sellingcost = '$psellingcost' WHERE product_id = {$pid}";
    if(mysqli_query($conn,$sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Product Details</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $request_id = $_REQUEST['id'];

  $sql = "SELECT * FROM tbl_assets WHERE product_id = {$request_id}";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="product_id">Product ID</label>
      <input type="text" class="form-control" id="pid" name="product_id" value="<?php if(isset($row['product_id'])) {echo $row['product_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="product_name">Name</label>
      <input type="text" class="form-control" id="pname" name="product_name" value="<?php if(isset($row['product_name'])) {echo $row['product_name']; }?>">
    </div>
    <div class="form-group">
      <label for="product_dop">DOP</label>
      <input type="date" class="form-control" id="pdop" name="product_dop" value="<?php if(isset($row['product_dop'])) {echo $row['product_dop']; }?>">
    </div>
    <div class="form-group">
      <label for="product_availabale">Available</label>
      <input type="text" class="form-control" id="pava" name="product_available" value="<?php if(isset($row['product_available'])) {echo $row['product_available']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="product_total">Total</label>
      <input type="text" class="form-control" id="ptotal" name="product_total" value="<?php if(isset($row['product_total'])) {echo $row['product_total']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="product_originalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="product_originalcost" value="<?php if(isset($row['product_originalcost'])) {echo $row['product_originalcost']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="product_sellingcost">Selling Price Each</label>
      <input type="text" class="form-control" id="psellingcost" name="product_sellingcost" value="<?php if(isset($row['product_sellingcost'])) {echo $row['product_sellingcost']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-outline-success" id="pupdate" name="product_update">Update</button>
      <a href="assets.php" class="btn btn-outline-secondary">Close</a>
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