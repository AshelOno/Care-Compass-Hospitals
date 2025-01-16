<?php
// Database connection details
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password (leave blank if not set)
$database = "hospital_db"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connected successfully!";
?>

