<?php
session_start();
if ($_SESSION['role_id'] != 1) {
    header("Location: index.php");
    exit;
}
echo "<h1>Welcome, Administrator</h1>";
echo "<p>Manage hospital data here.</p>";
?>
