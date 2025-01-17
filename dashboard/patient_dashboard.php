<?php
session_start();
if ($_SESSION['role_id'] != 3) {
    header("Location: index.php");
    exit;
}
echo "<h1>Welcome, Patient</h1>";
echo "<p>Schedule appointments and view medical records here.</p>";
?>
