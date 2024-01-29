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

    <link rel="stylesheet" type="text/css" href="admin.css">
    <!--Add Icon into Title Bar-->
    <link rel="icon" type="image/png" href="assets/microchip.svg">
    <title>Student Attendance Management System</title>

    <!--Script for logout into same page-->
    <script>function navigateToPage(url) {
            var targetUrl = "../" + url;
            window.location.href = targetUrl;
        }
    </script>
    <div class="container navbar">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="studentdata.php">Students Data</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="usercontrol.php">User Control</a>
            </li>
        </ul>
    </div>

</head>

<body>
    <!-- Navigaton bar-->
    <div class="userbtn">
        <button type="button" class="btn btn-primary btnlogout" onclick="navigateToPage('index.php')"
            title="Logout">Logout</button>
    </div>
    <div class="container">
        <h1>Welcome Admin!</h1>
    </div>



</body>

</html>