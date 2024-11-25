<?php

require_once __DIR__ . '/../../env_loader.php';

// app/config/db_config.php
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Sorry, we are having some issues with our server. Please try again later.");
}
?>
