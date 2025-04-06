<?php
// Step 1: Database connection
$host = 'localhost'; // Database host
$user = 'root'; // Database username
$password = ''; // Database password
$database = 'sms'; // Database name

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
die('Connection failed: ' . mysqli_connect_error());
}
?>