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
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .dashboard-header h2 {
            font-size: 2rem;
            color: #003366;
        }
        .dashboard-header p {
            font-size: 1rem;
            color: #666;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .nav-links a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #003366;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .nav-links a:hover {
            background-color: #002244;
            transform: translateY(-2px);
        }
        .search-bar {
            text-align: center;
            margin: 20px 0;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-bar button:hover {
            background-color: #002244;
        }
        .notifications {
            margin-top: 20px;
        }
        .notifications h3 {
            font-size: 1.5rem;
            color: #003366;
            margin-bottom: 10px;
        }
        .notifications ul {
            list-style: none;
            padding: 0;
        }
        .notifications ul li {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            text-align: center;
            margin-top: 20px;
        }
        .logout-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #cc0000;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .logout-btn a:hover {
            background-color: #990000;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="dashboard-header">
            <h2>Welcome, Patient</h2>
            <p>Manage your appointments, view medical records, and more.</p>
        </div>

        <div class="nav-links">
            <a href="view_appointments.php">View Appointments</a>
            <a href="book_appointment.php">Book Appointment</a>
            <a href="view_medical_records.php">View Medical Records</a>
            <a href="update_profile.php">Update Profile</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search appointments or records...">
            <button>Search</button>
        </div>

        <div class="notifications">
            <h3>Notifications</h3>
            <ul>
                <li>Upcoming Appointment: Dr. John Smith on Feb 1, 2025 at 10:00 AM</li>
                <li>Your test results are now available in Medical Records.</li>
                <li>Profile update successful!</li>
            </ul>
        </div>

        <div class="logout-btn">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> Care Compass. All Rights Reserved.
    </footer>

</body>
</html>
