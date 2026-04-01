<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "event";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed:  event_planner" event_planner. mysqli_connect_error());
}

echo "Connected successfully!";
?>
