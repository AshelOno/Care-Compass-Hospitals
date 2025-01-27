<?php
session_start();
include 'src/config.php'; // Ensure this file is properly included

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 for password encryption (consider using a stronger hash method)

    // Verify database connection
    if ($conn) {
        // Prepare the SQL statement to prevent SQL injection
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Check if a user is found
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirect based on role
            if ($user['role_id'] == 1) {
                header("Location: admin_dashboard.php");
            } elseif ($user['role_id'] == 2) {
                header("Location: staff_dashboard.php");
            } elseif ($user['role_id'] == 3) {
                header("Location: patient_dashboard.php");
            }
            exit(); // Always call exit() after a header redirect
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "Database connection error.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Care Compass</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <button class="home-btn" onclick="window.location.href='public/index.php';">Home</button>
        <h2>Login</h2>

        <?php if (isset($error_message)) { echo "<p class='error-message'>$error_message</p>"; } ?>

        <form action="login.php" method="POST">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-primary">Login</button>
        </form>

        <p>
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</body>
</html>

<style>
    body {
    background: linear-gradient(to right, #25cc95, #077294);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    color: #fff;
    box-sizing: border-box;
}

.container {
    background: #ffffff;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
    width: 100%;
    max-width: 420px;
    animation: fadeIn 1s ease-in-out;
    box-sizing: border-box;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.home-btn {
    background-color: #ffcc00;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-size: 16px;
    display: inline-block;
    text-align: center;
    margin-bottom: 20px;
}

.home-btn:hover {
    background-color: #ffa500;
    transform: translateY(-2px);
}

h2 {
    text-align: center;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
    font-size: 24px;
}

.input-container {
    position: relative;
    margin-bottom: 20px;
}

.input-container input,
.input-container select {
    width: 100%;
    padding: 12px 0px;
    padding-left: 0px;
    border: 1px solid #ddd;
    border-radius: 25px;
    font-size: 14px;
    background: #f9f9f9;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    color: #333;
    transition: all 0.3s ease;
}

.input-container input:focus,
.input-container select:focus {
    outline: none;
    border-color: #25cc95;
    box-shadow: 0 0 5px rgba(37, 204, 149, 0.8);
    background: #ffffff;
}

.input-container .icon {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #888;
    font-size: 18px;
}

.btn-primary {
    background-color: #25cc95;
    color: #fff;
    border: none;
    border-radius: 25px;
    width: 100%;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: #1eab7d;
    transform: translateY(-2px);
}

.btn-primary:active {
    transform: translateY(0);
}

.error-message {
    background-color: #ffdddd;
    color: #d8000c;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    margin-bottom: 15px;
    font-size: 14px;
}

p {
    text-align: center;
    font-size: 14px;
    color: #666;
    margin-top: 20px;
}

p a {
    color: #25cc95;
    font-weight: bold;
    text-decoration: none;
    transition: color 0.3s ease;
}

p a:hover {
    color: #1eab7d;
}

@media (max-width: 576px) {
    .container {
        padding: 20px;
        width: 90%;
    }

    .home-btn {
        font-size: 14px;
        padding: 10px 15px;
    }

    .btn-primary {
        padding: 10px;
        font-size: 14px;
    }

    .input-container input,
    .input-container select {
        padding-left: 45px;
    }
}

@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }

    h2 {
        font-size: 22px;
    }
}

</style>