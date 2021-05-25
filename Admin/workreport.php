<?php
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
require_once __DIR__.'/includes/header.php';
require_once '../dbConnection.php';

session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="start_date">
      </div> <span> to </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="end_date">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-outline-secondary" name="search_submit" value="Search">
      </div>
    </div>
  </form>
  <?php
 if(isset($_REQUEST['search_submit'])){
    $start_date = $_REQUEST['start_date'];
    $end_date = $_REQUEST['end_date'];
    $sql = "SELECT * FROM tbl_assignwork WHERE assign_date BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
     echo '
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Req ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Technician</th>
      <th scope="col">Assigned Date</th>
    </tr>
  </thead>
  <tbody>';
  while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["requester_add2"].'</td>
    <td>'.$row["requester_city"].'</td>
    <td>'.$row["requester_mobile"].'</td>
    <td>'.$row["assign_tech"].'</td>
    <td>'.$row["assign_date"].'</td>
      </tr>';
    }
    echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-outline-success" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>
</div>
</div>
</div>

<?php
include('includes/footer.php'); 
?>