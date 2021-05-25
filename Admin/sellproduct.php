<?php    
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 if(isset($_REQUEST['psubmit'])){
  // Checking for Empty Fields
  if(($_REQUEST['customer_name'] == "") || ($_REQUEST['customer_address'] == "") || ($_REQUEST['customer_product_name'] == "") || ($_REQUEST['customer_product_quantity'] == "") || ($_REQUEST['customer_product_sellingcost'] == "") || ($_REQUEST['totalcost'] == "") || ($_REQUEST['selldate'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable for update
    $pid = $_REQUEST['product_id'];
    $pava = ($_REQUEST['product_available'] - $_REQUEST['customer_product_quantity']);

    // Assigning User Values to Variable for insert
    $custname = $_REQUEST['customer_name'];
    $custadd = $_REQUEST['customer_address'];
    $cpname = $_REQUEST['customer_product_name'];
    $cpquantity = $_REQUEST['customer_product_quantity'];
    $cpeach = $_REQUEST['customer_product_sellingcost'];
    $cptotal = $_REQUEST['totalcost'];
    $cpdate = $_REQUEST['selldate'];
    $sql = "INSERT INTO tbl_customer(customer_name, customer_address, customer_product_name, customer_product_quantity, customer_product_each, customer_product_total, customer_product_date) VALUES ('$custname','$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
    if(mysqli_query($conn,$sql) == TRUE){
      // below function captures inserted id
      $genid = mysqli_insert_id($conn);
      session_start();
      $_SESSION['myid'] = $genid;
      echo "<script> location.href='productsellsuccess.php'; </script>";
    } 
    // Updating Assest data for available product after sell
    $sql1 = "UPDATE tbl_assets SET product_available = '$pava' WHERE product_id = '$pid'";
    mysqli_query($conn,$sql1);
  }
}
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Customer Bill</h3>
  <?php
 if(isset($_REQUEST['issue'])){
  $request_id = $_REQUEST['id'];

  $sql = "SELECT * FROM tbl_assets WHERE product_id = {$request_id}";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="pid" name="product_id" value="<?php if(isset($row['product_id'])) {echo $row['product_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="cname">Customer Name</label>
      <input type="text" class="form-control" id="cname" name="customer_name">
    </div>
    <div class="form-group">
      <label for="cadd">Customer Address</label>
      <input type="text" class="form-control" id="cadd" name="customer_address">
    </div>
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="customer_product_name" value="<?php if(isset($row['product_name'])) {echo $row['product_name']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="product_available" value="<?php if(isset($row['product_available'])) {echo $row['product_available']; }?>"
        readonly onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="pquantity">Quantity</label>
      <input type="text" class="form-control" id="pquantity" name="customer_product_quantity" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Price Each</label>
      <input type="text" class="form-control" id="psellingcost" name="customer_product_sellingcost" value="<?php if(isset($row['product_sellingcost'])) {echo $row['product_sellingcost']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="totalcost">Total Price</label>
      <input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group col-md-4">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="selldate">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-outline-success" id="psubmit" name="psubmit">Submit</button>
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