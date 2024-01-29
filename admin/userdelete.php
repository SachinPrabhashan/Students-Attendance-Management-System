<?php
if (isset($_GET["username"])) {
    $username = $_GET["username"];

    include 'config.php';

    $sql = "DELETE FROM loginform WHERE username= '$username'";
    $connection->query($sql);
}

header("location: usercontrol.php");
exit;

?>