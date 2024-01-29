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
    <!-- Navigaton bar-->
    <div class="userbtn">
        <button type="button" class="btn btn-primary btnlogout" onclick="navigateToPage('index.php')"
            title="Logout">Logout</button>
    </div>

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
                        <th>GUARDIAN CONTACT NO</th>
                        <th>ADDRESS</th>
                        </tr>
                        </thead>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo
                    "<tr>
                        <td>{$row['regno']}</td>                    
                        <td>{$row['name']}</td>
                        <td>{$row['nic']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['guardiancontact']}</td>
                        <td>{$row['address']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='studentdataedit.php?regno={$row['regno']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='studentdatadelete.php?regno={$row['regno']}'>Delete</a>
                            </td>
                        </tr>";
            }
            ?>


        </table>
    </div>

    <script>
        $(document).ready(function () {
            $(".edit-btn").click(function () {
                // Get the registration number from the data attribute
                var regNo = $(this).data("regno");

                // Redirect to the edit view with the registration number as a parameter
                window.location.href = "studentdataedit.php?regno=" + regNo;
            });
        });
    </script>


</body>

</html>