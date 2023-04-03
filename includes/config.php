<?php
$db_host = 'vesta.uclan.ac.uk';
$db_user = 'ikostin';
$db_pass = 'ftTmCpAq';
$db_name = 'ikostin';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>