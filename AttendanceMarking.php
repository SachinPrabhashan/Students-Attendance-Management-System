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
  <div class="userbtn">
    <button type="button" class="bnthome" onclick="navigateToPage('index.html')" title="Home"></button>
    <button type="button" class="btnlogout" onclick="navigateToPage('index.php')" title="Logout"></button>
    <button type="button" class=" btn-outline-info" title="Profile"></button>
  </div>
  <div class="container">
    <h1>Student Attendance Management System - ABC Institute</h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active attendmark" aria-current="page" href="AttendanceMarking.php">Attendance Marking</a>
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
  <form class="container" method="post" name="regform">
    <br>
    <div class="col-md-3">
      <label for="sturegno" class="form-label">Student Registration No:</label>
      <input type="text" class="form-control" name="sturegno" placeholder="Registration No" required>
    </div>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
  </form>
  <br>
  <!--Student Detail Table-->
  <div class="container">
    <table class="table">
      <?php
      include 'config.php';

      if (isset($_POST['submit'])) {
        $search = $_POST['sturegno'];

        $sql = "SELECT * FROM stureg WHERE regno='$search'";
        $result = mysqli_query($connection, $sql);

        if ($result) {
          if (mysqli_num_rows($result) > 0) {
            echo '<thead>
                        <tr>
                        <th>REG NO.</th>
                        <th>NAME</th>
                        <th>NIC</th>
                        <th>CONTACT NO</th>
                        <th>GUARDIAN CONTACT</th>
                        <th>ADDRESS</th>
                        </tr>
                        </thead>';
            $row = mysqli_fetch_assoc($result);
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

          } else {
            echo '<h2 class=text-danger>Data Not Found</h2>';
          }

        }
      }
      ?>

    </table>
  </div>

  <!--Check in / Check Out Option-->

  <br>
  <div>
    <form method="post" action="insertdatetime.php" class="container col-lg-6 offset-lg-8">

      <div class="form-check">
        <div class="form-group">
          <input class="mb-3" type="radio" id="html" name="selectstatus" value="in" onclick="updateDateTime()">
          <label class="me-3 chckword" for="html">CHECK IN</label>

          <input type="radio" id="css" name="selectstatus" value="out" onclick="updateDateTime()">
          <label class="me-3 chckword" for="css">CHECK OUT</label><br>

        </div>


        <div class="row row-cols-1">
          <div class="col-sm-3">
            <input type="text" id="date" name="date" class="form-control" placeholder="Pick a Date" required>
          </div>
          <div class="col-sm-3">
            <input type="text" id="time" name="time" class="form-control" placeholder="Pick a Time" required>
          </div>
        </div>
      </div>

      <!--Take values from stureg table-->
      <div>
        <input type="hidden" name="regno" value="<?php echo $row['regno']; ?>">
      </div>

      <br>
      <div class="container">
        <button type="reset" class="btn btn-danger">CLEAR</button>
        <button type="submit" name="savedatetime" class="btn btn-primary btn-success">UPDATE</button>

      </div>
    </form>
  </div>
  <script>
    function updateDateTime() {
      var currentDateTime = new Date();
      var dateField = document.getElementById("date");
      var timeField = document.getElementById("time");

      // Format the date and time as desired (e.g., MM/DD/YYYY and HH:MM:SS)
      var formattedDate =
        currentDateTime.getFullYear() + '-' +
        (currentDateTime.getMonth() + 1).toString().padStart(2, '0') +'-' +
        currentDateTime.getDate().toString().padStart(2, '0');

      var formattedTime = currentDateTime.getHours().toString().padStart(2, '0') + ':' +
        currentDateTime.getMinutes().toString().padStart(2, '0') + ':' +
        currentDateTime.getSeconds().toString().padStart(2, '0');

      dateField.value = formattedDate;
      timeField.value = formattedTime;
    }
  </script>

  <script>
    function validateForm() {
      var stureg = document.forms["regform"]["sturegno"].value;

      if (isNaN(stureg)) {
        alert("Enter Valid Index Number");
        return false;
      }
      return true;
    }
  </script>


</body>

</html>