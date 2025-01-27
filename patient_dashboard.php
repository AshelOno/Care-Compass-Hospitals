<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header("Location: login.php"); // Redirect to login if not logged in as patient
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard | Care Compass</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
        .container { width: 80%; margin: auto; padding: 20px; }
        .dashboard-header { text-align: center; }
        .nav-links { list-style-type: none; padding: 0; text-align: center; }
        .nav-links li { display: inline; margin: 10px; }
        .nav-links a { text-decoration: none; padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 5px; }
        .nav-links a:hover { background-color: #45a049; }
        .logout-btn { text-align: center; margin-top: 20px; }
        .logout-btn a { text-decoration: none; padding: 10px 20px; background-color: #f44336; color: white; border-radius: 5px; }
    </style>
</head>
<body>

    <div class="container">
        <div class="dashboard-header">
            <h2>Welcome, Patient</h2>
            <p>Manage your appointments, view medical records, and more.</p>
        </div>

        <ul class="nav-links">
            <li><a href="view_appointments.php">View Appointments</a></li>
            <li><a href="update_profile.php">Update Profile</a></li>
            <li><a href="view_medical_records.php">View Medical Records</a></li>
        </ul>

        <div class="logout-btn">
            <a href="logout.php">Logout</a>
        </div>
    </div>

</body>
</html>
