<?php

include 'config.php';

$regno = "";
$name = "";
$nic = "";
$contact = "";
$gaurdiancontact = "";
$address = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["regno"])) {
        header("location: /admin/studentdata.php");
        exit;
    }

    $regno = $_GET["regno"];

    $sql = "SELECT * FROM stureg WHERE regno = $regno";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $name = $row["name"];
    $nic = $row["nic"];
    $contact = $row["contact"];
    $guardiancontact = $row["guardiancontact"];
    $address = $row["address"];

    if (!isset($_GET["regno"])) {
        header("location: studentdata.php");
        exit;
    }
} else {
    $regno = $_POST["regno"];
    $name = $_POST["name"];
    $nic = $_POST["nic"];
    $contact = $_POST["contact"];
    $guardiancontact = $_POST["guardiancontact"];
    $address = $_POST["address"];

    $sql = "UPDATE stureg
    SET name= '$name', nic= '$nic', contact='$contact',guardiancontact='$guardiancontact',address='$address'
    WHERE regno = $regno";

    $result = $connection->query($sql);


    if (!$result) {
        $error = "Invalid query: " . $connection->error;

    }

    header("location: studentdata.php");
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
                <a class="nav-link active" href="studentdata.php">Students Data</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="usercontrol.php">User Control</a>
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
            <input type="hidden" name="regno" value="<?php echo $regno; ?>">
            <div class="studataedit">
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">NIC</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nic" value="<?php echo $nic; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Contact No</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" required>
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <label for="exampleFormControlInput1" class="col sm-3 col-form-label">GUARDIAN CONTACT NO</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="guardiancontact"
                        value="<?php echo $guardiancontact; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="exampleFormControlInput1" class="col sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required>
                </div>
            </div>

    </div>
    <br>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="studentdata.php" role="button">Cancel</a>
        </div>
    </div>

    </form>
    </div>


</body>

</html>