<?php
// app/config/db_config.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "apex";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Sorry, we are having some issues with our server. Please try again later.");
}
?>
