<?php
session_start();
if ($_SESSION['role_id'] != 1) {
    header("Location: index.php");
    exit;
}
echo "Welcome to the Admin Dashboard, " . $_SESSION['username'];
?>
