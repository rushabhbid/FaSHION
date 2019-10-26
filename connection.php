<?php
session_start();
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "fashion";
// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>