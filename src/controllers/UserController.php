<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if username and password match from your database
    if (empty($username) || empty($password) || empty($role)) {
        $error_message = 'All fields are required.';
    } else {
        // Perform your authentication logic here, such as checking the database
        // For example, assuming valid credentials:
        if ($username === 'admin' && $password === 'admin123' && $role === 'admin') {
            // Redirect or perform login action
            header("Location: dashboard.php");
            exit;
        } else {
            $error_message = 'Invalid credentials. Please try again.';
        }
    }
}
?>
