<?php
/*Creating Connection with Database*/

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "sams";

$connection = new mysqli($server_name, $user_name, $password, $database);

/*For Check Connection OK

if($connection -> connect_error ){
    die("Connection Error");
}else{
    echo 'Connection OK';
}

*/

?>