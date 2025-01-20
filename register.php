<?php
session_start();
include 'db.php'; // include your database connection file

// Initialize variables
$username = $email = $full_name = $password = $confirm_password = $role = "";
$username_err = $email_err = $full_name_err = $password_err = $confirm_password_err = $role_err = "";

// Process the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Check if username already exists
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);

            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate full name
    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Please enter your full name.";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm your password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // Validate role selection
    if (empty(trim($_POST["role"]))) {
        $role_err = "Please select your role.";
    } else {
        $role = trim($_POST["role"]);
    }

    // Check for errors before inserting into the database
    if (empty($username_err) && empty($email_err) && empty($full_name_err) && empty($password_err) && empty($confirm_password_err) && empty($role_err)) {
        // Prepare SQL insert statement
        $sql = "INSERT INTO users (username, email, full_name, password, role) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Bind variables to the prepared statement
            $stmt->bind_param("sssss", $param_username, $param_email, $param_full_name, $param_password, $param_role);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_full_name = $full_name;
            $param_password = $hashed_password;
            $param_role = $role;

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to the login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Care Compass Hospitals</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <p>Please fill in the form to create an account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control <?php echo (!empty($full_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $full_name; ?>">
                <span class="invalid-feedback"><?php echo $full_name_err; ?></span>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>">
                    <option value="">Select Role</option>
                    <option value="admin" <?php echo ($role == "admin") ? 'selected' : ''; ?>>Administrator</option>
                    <option value="staff" <?php echo ($role == "staff") ? 'selected' : ''; ?>>Hospital Staff</option>
                    <option value="patient" <?php echo ($role == "patient") ? 'selected' : ''; ?>>Patient</option>
                </select>
                <span class="invalid-feedback"><?php echo $role_err; ?></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
