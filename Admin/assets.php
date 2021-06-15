<?php
define('TITLE', 'Assests');
define('PAGE', 'assets');
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-dark text-white p-2">Product/Parts Details</p>
  <?php
    $sql = "SELECT * FROM tbl_assets";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
  echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">DOP</th>
        <th scope="col">Available</th>
        <th scope="col">Total</th>
        <th scope="col">Original Cost Each</th>
        <th scope="col">Selling Price Each</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr>
        <th scope="row">'.$row["product_id"].'</th>
        <td>'.$row["product_name"].'</td>
        <td>'.$row["product_dop"].'</td>
        <td>'.$row["product_available"].'</td>
        <td>'.$row["product_total"].'</td>
        <td>'.$row["product_originalcost"].'</td>
        <td>'.$row["product_sellingcost"].'</td>
        <td>
          <form action="editproduct.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["product_id"] .'><button type="submit" class="btn btn-info" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["product_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
          <form action="sellproduct.php" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["product_id"] .'><button type="submit" class="btn btn-success" name="issue" value="Issue"><i class="fas fa-handshake"></i></button></form>
        </td>
      </tr>';
    }
    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $request_id = $_REQUEST['id'];
    $sql = "DELETE FROM tbl_assets WHERE product_id = {$request_id}";
    if(mysqli_query($conn,$sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>
</div>
<a class="btn btn-success box" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('includes/footer.php'); 
?>