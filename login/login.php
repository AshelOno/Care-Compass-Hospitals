<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if (!empty($username) && !empty($password) && !empty($role)) {
        $sql = "SELECT * FROM users WHERE username = ? AND role_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];

                switch ($user['role_id']) {
                    case 'admin':
                        header("Location: ../dashboard/admin_dashboard.php");
                        break;
                    case 'staff':
                        header("Location: ../dashboard/staff_dashboard.php");
                        break;
                    case 'patient':
                        header("Location: ../dashboard/patient_dashboard.php");
                        break;
                    default:
                        echo "Invalid role.";
                        exit;
                }
                exit;
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            $error_message = "User not found.";
        }
    } else {
        $error_message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background: url('uploads/index_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        .input-container {
            position: relative;
            margin-bottom: 20px;
        }
        .input-container input {
            width: 100%;
            padding: 10px;
            padding-left: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-container .icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
        }
        .btn-primary {
            background-color: #25cc95;
            color: white;
            border: none;
            border-radius: 25px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #1eab7d;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error_message)) { echo '<p class="error-message">'.$error_message.'</p>'; } ?>
        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
                <i class="fas fa-user icon"></i>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock icon"></i>
            </div>
            <div class="input-container">
                <select name="role" required class="form-control">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Hospital Staff</option>
                    <option value="patient">Patient</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
