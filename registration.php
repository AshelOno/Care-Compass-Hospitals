<?php
session_start();
include 'src/config.php'; // This file should define the Database class and return a PDO connection

// Initialize Database connection (PDO)
$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data with sanitization
    $username         = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email            = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password         = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
    $role_id          = isset($_POST['role_id']) ? $_POST['role_id'] : '';
    $phone            = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    // Error handling
    $errors = [];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "A valid 10-digit phone number is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    if (!in_array($role_id, ['1', '2', '3'])) {
        $errors[] = "Please select a valid role.";
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $errors[] = "Email is already registered.";
    }
    $stmt->closeCursor();

    // If no errors, insert user into database using PDO
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $current_time    = date('Y-m-d H:i:s'); // Fetch current date and time

        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password, role_id, created_at) 
                                VALUES (:username, :email, :phone, :password, :role_id, :created_at)");

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(':role_id', $role_id, PDO::PARAM_INT);
        $stmt->bindValue(':created_at', $current_time, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful! You can <a href='login.php'>login here</a>.</p>";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "<p style='color: red;'>Error: " . $errorInfo[2] . "</p>";
        }
    }
}

// Close the connection by setting it to null
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Care Compass</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, select, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .info {
            font-size: 0.9em;
            color: #555;
            margin-top: -10px;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <?php if (!empty($errors)) : ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            <input type="text" name="phone" placeholder="Phone (10 digits)" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
            <span class="info">Example: 1234567890</span>
            <input type="password" name="password" placeholder="Password">
            <span class="info">Password must be at least 8 characters.</span>
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <select name="role_id">
                <option value="">Select Role</option>
                <option value="1" <?php echo (isset($role_id) && $role_id == '1') ? 'selected' : ''; ?>>Admin</option>
                <option value="2" <?php echo (isset($role_id) && $role_id == '2') ? 'selected' : ''; ?>>Staff</option>
                <option value="3" <?php echo (isset($role_id) && $role_id == '3') ? 'selected' : ''; ?>>Patient</option>
            </select>
            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>
