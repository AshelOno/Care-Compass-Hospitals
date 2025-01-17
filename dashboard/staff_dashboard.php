<?php
session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Dashboard</title>
</head>
<body>
    <h1>Welcome to the Staff Dashboard</h1>
    <p>You can manage patient records here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
