<?php
session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
</head>
<body>
    <h1>Welcome to the Patient Dashboard</h1>
    <p>Manage your health records here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>

