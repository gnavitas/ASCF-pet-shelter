<?php

$sname = "localhost";

$unmae = "u688796733_masacf";

$password = "Marilawan123!";

$db_name = "u688796733_masacf";



$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed to database!";

}
?>