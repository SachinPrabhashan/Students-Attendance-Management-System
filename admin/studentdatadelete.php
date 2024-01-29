<?php
if (isset($_GET["regno"])) {
    $regno = $_GET["regno"];

    include 'config.php';

    $sql = "DELETE FROM stureg WHERE regno= '$regno'";
    $connection->query($sql);
}

header("location: studentdata.php");
exit;

?>