<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Care Compass</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
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
            margin-bottom: 30px;
        }
        .dashboard-header h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #4CAF50;
        }
        .dashboard-header p {
            font-size: 1rem;
            color: #666;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .nav-links a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .nav-links a:hover {
            background-color: #45a049;
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
            outline: none;
            font-size: 16px;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-bar button:hover {
            background-color: #45a049;
        }
        .activity-log {
            margin-top: 30px;
        }
        .activity-log h3 {
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .activity-log ul {
            list-style: none;
            padding: 0;
        }
        .activity-log ul li {
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
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .logout-btn a:hover {
            background-color: #d32f2f;
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
            <h2>Welcome, Admin</h2>
            <p>Manage the system and users here efficiently.</p>
        </div>

        <div class="nav-links">
            <a href="dashboard_overview.php">Dashboard Overview</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="view_reports.php">View Reports</a>
            <a href="settings.php">Settings</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search users or reports...">
            <button>Search</button>
        </div>

        <div class="activity-log">
            <h3>Recent Activity</h3>
            <ul>
                <li>Added a new user: John Doe</li>
                <li>Updated system settings</li>
                <li>Viewed monthly report</li>
                <li>Deleted inactive user: Jane Smith</li>
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
