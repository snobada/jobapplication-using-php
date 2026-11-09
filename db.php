<?php

// Database Configuration
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "job_application";

// Create MySQL Connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Set Character Encoding
$conn->set_charset("utf8");

?>