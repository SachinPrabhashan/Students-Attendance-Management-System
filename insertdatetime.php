<!-- Php Script for Send data to database as DATETIME-->
<!-- Php Script for Send data to database as DATETIME-->
<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "sams";

$connection = new mysqli($server_name, $user_name, $password, $database);

if (isset($_POST['selectstatus']) && $_POST['selectstatus'] == 'in') {
  if (isset($_POST['savedatetime'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['selectstatus'];
    $regno = $_POST['regno'];


    $query = "INSERT INTO attendrepcheckin (date, regno, checkintime, status) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("siss", $date, $regno, $time, $status);
    $stmt->execute();

  }
} else {
  if (isset($_POST['savedatetime'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['selectstatus'];
    $regno = $_POST['regno'];


    $query = "INSERT INTO attendrepcheckout (date, regno, checkouttime, status) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("siss", $date, $regno, $time, $status);
    $stmt->execute();

  }
}

?>


<!-- ATTENDANCE MARKING TAB -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script type="text/javascript" src="js\bootstrap.bundle.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="custom.css">
  <!--Add Icon into Title Bar-->
  <link rel="icon" type="image/png" href="assets/microchip.svg">
  <title>Student Attendance Management System</title>

  <!--Script for logout into same page-->
  <script>function navigateToPage(url) {
      window.location.href = url;
    }
  </script>
</head>

<body>
  <!-- Navigaton bar-->
  <div class="userbtn">
    <button type="button" class="btnlogout" onclick="navigateToPage('index.php')"></button>
    <button type="button" class=" btn-outline-info"> </button>
  </div>
  <div class="container">
    <h1>Student Attendance Management System - ABC Institute</h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="AttendanceMarking.php">Attendance Marking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="StudentRegistration.html">Students Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AttendanceReport.php">Attendance Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="StudentView.php">Students View</a>
      </li>
    </ul>
  </div>
  <!--Student Reg No Entering part-->
  <div class="container ">
    <h1>ATTENDANCE UPDATE SUCCESSFUL !!</h1>
  </div>
  <br>
  <div class="container col-sm-3">
    <a href="AttendanceMarking.php" class="btn btn-primary">NEXT STUDENT</a>
  </div>
</body>

</html>