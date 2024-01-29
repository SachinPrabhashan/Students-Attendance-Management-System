<!-- STUDENT REGISTRATION & SUCCESSFULL MESSAGE DISPLAY TAB -->
<?php
include 'config.php';
// Validate and sanitize user input
$name = filter_input(INPUT_POST, 'inputName', FILTER_SANITIZE_STRING);
$nic = filter_input(INPUT_POST, 'inputNIC', FILTER_SANITIZE_STRING);
$contact = filter_input(INPUT_POST, 'inputContactNo', FILTER_SANITIZE_NUMBER_INT);
$guardianconact = filter_input(INPUT_POST, 'inputGuadianNo', FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST, 'inputAddress', FILTER_SANITIZE_STRING);
// Prepare and execute the SQL statement
$sql = "INSERT INTO stureg (name, nic, contact, guardiancontact, address) VALUES (?, ?, ?, ?, ?)";
$statement = $connection->prepare($sql);
if (!$statement) {
  // Handle errors
  die("Error: " . $connection->error);
}
$statement->bind_param("ssiis", $name, $nic, $contact, $guardianconact, $address);
if (!$statement->execute()) {
  // Handle errors
  die("Error: " . $statement->error);
}
// Close the statement and connection
$statement->close();
$connection->close();
?>

<!--New HTML document for redirect php to previous page-->
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
        <a class="nav-link" aria-current="page" href="AttendanceMarking.php">Attendance Marking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="StudentRegistration.html">Students Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AttendanceReport.php">Attendance Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="StudentView.php">Students View</a>
      </li>
    </ul>
  </div>
  <div class="container ">
    <h1>REGISTRATION SUCCESSFUL !!</h1>
  </div>
  <br>
  <div class="container col-sm-3">
    <a href="StudentRegistration.html" class="btn btn-primary">NEW REGISTRATION</a>
  </div>
</body>

</html>