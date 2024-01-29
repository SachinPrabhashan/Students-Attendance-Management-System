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
        <a class="nav-link " href="StudentRegistration.html">Students Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="AttendanceReport.php">Attendance Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="StudentView.php">Students View</a>
      </li>
    </ul>
  </div>
  <!--Date Picker & Search Button-->
  <div class="container filt">
    <br>
    <h4>Generate Attendance Report</h4>
    <form method="post" action="">
      <br>
      <div class="container">
        <div class="row row-cols-2">
          <div class="col-sm-3">
            <div class="input-group date" id="datepicker">
              <input type="date" name="fromdate" class="form-control" placeholder="Start Date">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="input-group date" id="datepicker">
              <input type="date" name="todate" class="form-control" placeholder="End Date">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="input-group date" id="datepicker">
              <input type="text" name="regno" class="form-control" placeholder="Insert Student Reg. No">
            </div>
          </div>
        </div>
        <br>
        <button type="submit" name="search_data" class="btn btn-primary">Search</button>
      </div>

    </form>
  </div>
  <div class="container tablewhole">
    <!--Table for load details-->
    <table class="table">
      <?php
      $server_name = "localhost";
      $user_name = "root";
      $password = "";
      $database = "sams";

      $connection = new mysqli($server_name, $user_name, $password, $database);

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      if (isset($_POST['search_data'])) {
        $search = $_POST['regno'];
        $startdt = $_POST['fromdate'];
        $enddt = $_POST['todate'];

        $sql = "SELECT
        a.regno AS reg_no,
        a.date,
        stureg.name,
        a.checkintime,
        c.checkouttime
    FROM attendrepcheckin a
    LEFT JOIN attendrepcheckout c ON a.regno = c.regno AND a.date = c.date
    LEFT JOIN stureg ON a.regno = stureg.regno";


        if (!empty($search)) {
          $sql .= " WHERE a.regno = '$search'";

          if (!empty($startdt) && !empty($enddt)) {
            $sql .= " AND a.date BETWEEN '$startdt' AND '$enddt'";
          }
        } else {

          if (!empty($startdt) && !empty($enddt)) {
            $sql .= " WHERE a.date BETWEEN '$startdt' AND '$enddt'";
          }
        }


        $sql .= " ORDER BY a.date ASC";

        $result = mysqli_query($connection, $sql);

        if ($result) {
          if (mysqli_num_rows($result) > 0) {
            echo '<thead>
            <tr>
            <th>REG NO.</th>
            <th>NAME</th>
            <th>DATE</th>
            <th>Check in Time</th>
            <th>Check out Time</th>
            </tr>
            </thead>';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tbody>
                <tr>
                    <td>' . $row['reg_no'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['checkintime'] . '</td>
                    <td>' . $row['checkouttime'] . '</td>
                </tr>
                </tbody>';
            }
          }
        }
      }
      ?>
    </table>



  </div>
  <div class="container col-lg-2 me-5">
    <div class="container col-lg-4 mb-3">
      <button class="btn btn-success" onclick="printTable()">PRINT</button>
    </div>

    <!--Table Date Clear Button-->
    <div class="container col-lg-6 ">
      <button type="reset" class="btn btn-danger">CLEAR</button>

    </div>
  </div>
  <!--Print Button Script-->
  <script>
    function printTable() {
      window.print();
    }
  </script>

</body>

</html>