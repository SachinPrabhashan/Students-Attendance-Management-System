<!-- STUDENTS VIEW TAB -->

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
    <button type="button" class="bnthome" onclick="navigateToPage('index.html')" title="Home"></button>
    <button type="button" class="btnlogout" onclick="navigateToPage('index.php')" title="Logout"></button>
    <button type="button" class=" btn-outline-info" title="Profile"></button>
  </div>
  <div class="container">
    <h1>Student Attendance Management System - ABC Institute</h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="AttendanceMarking.php">Attendance Marking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="StudentRegistration.html">Students Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AttendanceReport.php">Attendance Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="StudentView.php">Students View</a>
      </li>
    </ul>
  </div>
  <br>
  <div class="container tablewhole">

    <table class="table">

      <?php
      include 'config.php';
      $sql = "SELECT * FROM stureg";
      $result = mysqli_query($connection, $sql);
      mysqli_close($connection);

      echo '<thead>
                        <tr>
                        <th>REG NO.</th>
                        <th>NAME</th>
                        <th>NIC</th>
                        <th>CONTACT NO</th>
                        <th>GUARDIANCONTACT NO</th>
                        <th>ADDRESS</th>
                        </tr>
                        </thead>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tbody>
                        <tr>
                            <td>' . $row['regno'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['nic'] . '</td>
                            <td>' . $row['contact'] . '</td>
                            <td>' . $row['guardiancontact'] . '</td>
                            <td>' . $row['address'] . '</td>
                        </tr>
                        </tbody>
                        ';
      }
      ?>


    </table>
  </div>


</body>

</html>