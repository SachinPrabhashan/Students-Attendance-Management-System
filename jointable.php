<?php
// Step 1: Connect to MySQL server
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "sams";

$connection = new mysqli($server_name, $user_name, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create "attendancereport" table
$sql = "INSERT INTO attendancereport (date, regno, name, checkintime, checkouttime)
        SELECT
            DATE_ADD(MAX(attendancereport.date), INTERVAL 1 DAY) AS next_date,
            stureg.regno AS regno,
            stureg.name AS name,
            attendrepcheckin.checkintime,
            attendrepcheckout.checkouttime
        FROM
            attendrepcheckout
            INNER JOIN attendrepcheckin ON attendrepcheckout.regno = attendrepcheckin.regno
            INNER JOIN stureg ON stureg.regno = attendrepcheckout.regno
            LEFT JOIN attendancereport ON attendancereport.regno = attendrepcheckout.regno
        WHERE
            attendancereport.id IS NULL
        GROUP BY
            stureg.regno";

if (mysqli_query($connection, $sql)) {
    $rows_affected = mysqli_affected_rows($connection);

    // Add the following code to repeat the regno column data in the new date
    $last_id = mysqli_insert_id($connection);
    $repeat_sql = "UPDATE attendancereport SET regno = (SELECT regno FROM attendancereport WHERE id = $last_id) WHERE id = $last_id";
    mysqli_query($connection, $repeat_sql);

    echo "Data inserted into attendancereport table successfully. $rows_affected rows affected.<br>";
} else {
    echo "Error inserting or updating data: " . mysqli_error($connection) . "<br>";
}


// Step 4: Close MySQL connection
mysqli_close($connection);
?>