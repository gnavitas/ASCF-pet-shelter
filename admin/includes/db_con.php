<?php

$sname = "localhost";

$unmae = "u688796733_masacf";

$password = "Marilawan123!";

$db_name = "u688796733_masacf";

// $sname = "localhost";

// $unmae = "u739402240_masacf";

// $password = "";

// $db_name = "u739402240_masacf-pas";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed to database!";

}
?>