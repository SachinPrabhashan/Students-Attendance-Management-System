<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">

    <!-- Bootstrap JS-->
    <script type="text/javascript" src="js\bootstrap.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!--Add Icon into Title Bar-->
    <link rel="icon" type="image/png" href="assets/microchip.svg">
    <title>Student Attendance Management System</title>

    <!--Script for logout into same page-->
    <script>function navigateToPage(url) {
            window.location.href = url;
        }
    </script>
    <!--
            <div class="container navbar">
                <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="studentdata.php">Students Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">User Control</a>
                </li>
                </ul>
            </div>

-->

</head>

<body>
    <div>
        <center>
            <h1>Take the control on your hands</h1>
    </div>
    <?php
    // Password is invalidation Part
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM adminloginform WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);
        $row_data = mysqli_fetch_assoc($result);

        if ($username == $row_data['username'] and $password == $row_data['password']) {
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('adminhome.php' , '_self')</script>"; //add here the document that you want open after click login
        } else {
            // Password is invalid, display an error message
            $error = "Invalid password. Please try again.";
            echo "<script>alert('Login Unsuccessfull Check Username & Password')</script>";
        }
    }
    ?>
    <div>
        <form class="container adminlogform" method="POST" action="">
            <div class="form-outline mb-4">
                <input type="username" class="form-control" required name="username" />
                <label class="form-label" for="form2Example1">Admin Username</label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" class="form-control" required name="password" />
                <label class="form-label" for="form2Example2">Admin Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>