<?php
$servername = "127.0.0.1";  // Replace with your MySQL server IP address
$username = "root";         // Replace with your database username
$dbname = "deepswing";      // Replace with your actual database name

$conn = new mysqli($servername, $username, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
