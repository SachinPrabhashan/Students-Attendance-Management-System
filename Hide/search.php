<?php
    include 'config.php';

    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $index_no = $_POST['sturegno'];

            $query = "SELECT * FROM sams WHERE stureg = '$index_no'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Query failed: ' . mysqli_error($connection));
            }
            
        }

?>
