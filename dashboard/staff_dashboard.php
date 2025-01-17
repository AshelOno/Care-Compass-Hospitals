<?php
session_start();
if ($_SESSION['role_id'] != 2) {
    header("Location: index.php");
    exit;
}
echo "<h1>Welcome, Hospital Staff</h1>";
echo "<p>View schedules, update records here.</p>";
?>
