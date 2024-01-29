<?php
include 'config.php';

$name = "";
$username = "";
$password = "";
$privilege = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["username"])) {
        header("location: usercontrol.php");
        exit;
    }
    $username = $_GET["username"];

    // Sanitize the input data to prevent SQL injection
    $username = $connection->real_escape_string($username);

    // Use prepared statement to execute the query safely
    $sql = "SELECT * FROM loginform WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();


    // Check for query execution errors
    $result = $stmt->get_result();
    if (!$result) {
        $error = "Invalid query: " . $connection->error;
    } else {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $username = $row["username"];
        $password = $row["password"];
        $privilege = $row["privilege"];
    }

} else {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $privilege = $_POST["privilege"];

    $sql = "UPDATE loginform
    SET name= '$name', username = '$username', password ='$password', privilege ='$privilege'
    WHERE username = '$username'";

    $result = $connection->query($sql);


    if (!$result) {
        $error = "Invalid query: " . $connection->error;

    }

    header("location: usercontrol.php");
    exit;
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
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <div class="studataedit">
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>"
                            required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>"
                            required>
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Privilege</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="privilege" value="<?php echo $privilege; ?>" required>
                </div>
            </div>

    </div>
    <br>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="usercontrol.php" role="button">Cancel</a>
        </div>
    </div>

    </form>
    </div>


</body>

</html>