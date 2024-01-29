<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['privilege'])) {
        $name = $_POST['name'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $privilege = $_POST["privilege"];

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO loginform (name, username, password, privilege) VALUES (?, ?, ?, ?)";

        $statement = $connection->prepare($sql);
        if (!$statement) {
            // Handle errors
            die("Error: " . $connection->error);
        }

        $statement->bind_param("ssss", $name, $username, $password, $privilege);
        if (!$statement->execute()) {
            die("Error: " . $statement->error);
        }

        $statement->close();
        $connection->close();

        // Redirect to usercontrol.php after successful insertion
        header("Location: usercontrol.php");
        exit();
    } else {
        // If any required field is missing, show an error message
        die("Error: Required fields are missing.");
    }
}
?>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="#">
    <!--Add Icon into Title Bar-->
    <link rel="icon" type="image/png" href="assets/microchip.svg">
    <title>Student Attendance Management System</title>

    <!--Script for logout into same page-->
    <script>function navigateToPage(url) {
            window.location.href = url;
        }
    </script>
    <div class="container navbar">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="studentdata.php">Students Data</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="usercontrol.php">User Control</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminhome.php">Home</a>
            </li>
        </ul>
    </div>

</head>

<body>
    <div class="container my-5">

        <form class="form" method="post" action="">
            <!-- Include the hidden input field for regno -->
            <input type="hidden" name="username" value="">
            <div class="studataedit">
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="" required>
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Privilege</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="privilege" value="" required>
                </div>
            </div>

    </div>
    <br>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="usercontrol.php" role="button">Cancel</a>
        </div>
    </div>

    </form>
    </div>


</body>

</html>