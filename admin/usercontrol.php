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
                <a class="nav-link" href="studentdata.php">Students Data</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#">User Control</a>
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
        <div class="col-sm-3 d-grid">
            <a class="btn btn-primary" href="newuser.php" role="button">Add New User</a>
        </div>
        <table class="table">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM loginform";
            $result = mysqli_query($connection, $sql);
            mysqli_close($connection);

            echo '<thead>
                        <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Privilege</th>
                        </tr>
                        </thead>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tbody>
                        <tr>
                            <td>{$row['name']}</td>                    
                            <td>{$row['username']}</td>
                            <td>{$row['password']}</td>
                            <td>{$row['privilege']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='userctrledit.php?username={$row['username']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='userdelete.php?username={$row['username']}'>Delete</a>
                            </td>
                        </tr>
                        </tbody>";
            }
            ?>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $(".edit-btn").click(function () {
                var userName = $(this).data("username");
                window.location.href = "userctrledit.php?username=" + userName;
            });
        });
    </script>


</body>

</html>