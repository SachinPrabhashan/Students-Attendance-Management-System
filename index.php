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
  <link rel="stylesheet" type="text/css" href="welcome.css">
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
    <button type="button" class="bntadmin" onclick="navigateToPage('admin/adminlogin.php')" title="Admin">Admin</button>
  </div>

  <?php
  // Password is invalidation Part
  include 'config.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM loginform WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $row_data = mysqli_fetch_assoc($result);

    if ($username == $row_data['username'] and $password == $row_data['password']) {
      echo "<script>alert('Login Successfull')</script>";
      echo "<script>window.open('index.html' , '_self')</script>";
    } else {
      // Password is invalid, display an error message
      $error = "Invalid password. Please try again.";
      echo "<script>alert('Login Unsuccessfull Check Username & Password')</script>";
    }
  }
  ?>
  <div class="container">
    <h1 class="welcometxt">SAMS - ABC Institute</h1>
  </div>
  <!--Login Form-->
  <form class="container loginform" method="POST" action="">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="usename" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  <!--© Sachin Prahhashan 2023-->
</body>
<p class="copyright">© Sachin Prahhashan 2023 </p>

</html>