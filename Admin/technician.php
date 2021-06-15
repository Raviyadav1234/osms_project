<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
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
  <p class=" bg-dark text-white p-2">List of Technicians</p>
  <?php
    $sql = "SELECT * FROM tbl_technician";
    $result = mysqli_query($conn,$sql);
    if(mysqlI_num_rows($result) > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Emp ID</th>
    <th scope="col">Name</th>
    <th scope="col">City</th>
    <th scope="col">Mobile</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
  while($row = mysqli_fetch_assoc($result)){
   echo '<tr>';
    echo '<th scope="row">'.$row["emp_id"].'</th>';
    echo '<td>'. $row["emp_name"].'</td>';
    echo '<td>'.$row["emp_city"].'</td>';
    echo '<td>'.$row["emp_mobile"].'</td>';
    echo '<td>'.$row["emp_email"].'</td>';
    echo '<td><form action="editemp.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["emp_id"] .'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>  <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["emp_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
   </tr>';
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM tbl_technician WHERE emp_id = {$_REQUEST['id']}";
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
<div><a class="btn btn-success box" href="insertemp.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>

<?php
include('includes/footer.php'); 
?>