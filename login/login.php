<?php
session_start();
include '../db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username); // Bind the username to the placeholder
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];

                // Redirect based on user role
                switch ($user['role_id']) {
                    case 1:
                        header("Location: ../dashboard\admin_dashboard.php");
                        break;
                    case 2:
                        header("Location: staff_dashboard.php");
                        break;
                    case 3:
                        header("Location: patient_dashboard.php");
                        break;
                    default:
                        echo "Invalid role.";
                        exit;
                }
                exit;
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Username and password are required.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Login Form</title>
    <style>
    /* General Styles */
    body {
        background-image: url('../uploads/index_bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; 
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: ily: 'Montserrat', sans-serif;
        display: flex;
        margin: 90px auto;
}
    

    .container {
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .container button {
        background-color: rgba(8, 97, 68, 0.9);;
        color: #fff;
        font-size: 12px;
        padding: 10px 45px;
        border: 1px solid transparent;
        border-radius: 8px;100vh;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-top: 10px;
        cursor: pointer;
    }

    .container button.hidden {
        background-color: transparent;
        border-color: #fff;
    }

    .container form {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        height: 100%;
    }

    .container input {
        background-color: #eee;
        border: none;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 13px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }
    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .icons {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .icon {
        color: #888;
        font-size: 20px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .icon:hover {
        color: #25cc95;
    }

    .toggle-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: all 0.6s ease-in-out;
        border-radius: 150px 0 0 100px;
        z-index: 1000;
    }

    .toggle {
        background: linear-gradient(to right,  #25cc95,#077294);
        color: #fff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        animation: slideRight 0.6s forwards;
    }

    /* Container for input and icon */
    .input-container {
        position: relative;
        margin-bottom: 15px;
    }

    /* Style for the input field */
    .input-container input {
        width: 100%;
        padding: 10px;
        padding-left: 40px; /* Space for the icon */
        border: 1px solid #ccc;
        border-radius: 25px;
        font-size: 16px;
    }

    /* Style for the icon */
    .input-container .icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    /* Input focus effect */
    .input-container input:focus {
        border-color: #25cc95;
        box-shadow: 0 0 5px rgba(37, 204, 149, 0.5);
    }

    /* Icon hover effect */
    .input-container .icon:hover {
        color: #25cc95;
    }

    .custom-select-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    /* Hidden actual select element */
    .custom-select-container select {
        display: none;
    }

    /* Custom dropdown display */
    .custom-select-display {
        width: 100%;
        padding: 10px;
        padding-right: 40px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: white;
        cursor: pointer;
        position: relative;
        font-size: 16px;
        color: #333;
    }

    /* Icon in custom dropdown */
    .custom-select-display i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    /* Custom options dropdown */
    .custom-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: white;
        z-index: 1000;
    }

    /* Each custom option */
    .custom-option {
        padding: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Custom option icon */
    .custom-option i {
        margin-right: 10px;
    }

    /* Hover effect for custom options */
    .custom-option:hover {
        background-color: #25cc95;
        color: white;
    }

    /* Buttons */
    .btn-primary {
        background-color: #25cc95;
        color: white;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1eab7d;
    }

    .btn-secondary {
        background-color: #25cc95;
        color: #25cc95;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #1eab7d;
        color: white;
    }
    @keyframes slideRight {
        0% {
            left: -100%;
        }
        100% {
            left: 0;
        }
    }
</style>

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form id="loginForm" method="POST" action="" style="margin-top: -20px;">
                <div class="icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-github"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>  

                <div class="custom-select-container" style="width:140px;">
                    <div class="custom-select-display" onclick="toggleOptions()">Select Role <i class="fas fa-chevron-down"></i></div>
                    <div class="custom-options">
                        <div class="custom-option" onclick="selectOption('admin')"><i class="fas fa-user-shield"></i> Admin</div>
                        <div class="custom-option" onclick="selectOption('patient')"><i class="fas fa-procedures"></i> Patient</div>
                        <div class="custom-option" onclick="selectOption('staff')"><i class="fas fa-hospital-user"></i> H Staff</div>
                    </div>
                    <select id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="patient">Patient</option>
                        <option value="staff">H Staff</option>
                    </select>
                </div>

                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required>
                    <i class="fas fa-user icon"></i>
                </div>
                <div class="input-container" style="margin-top: -20px;">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-lock icon"></i>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <button type="button" class="btn btn-secondary" style="margin-left: 150px; margin-top: 200px;" onclick="location.href='../index.php'">Home</button>
            </div>
        </div>
    </div>

</body>
</html>
<script>
    function toggleOptions() {
        var options = document.querySelector('.custom-options');
        options.style.display = options.style.display === 'block' ? 'none' : 'block';
    }

    function selectOption(value) {
        var display = document.querySelector('.custom-select-display');
        var select = document.getElementById('role');
        select.value = value;
        display.innerHTML = document.querySelector('.custom-option[onclick="selectOption(\'' + value + '\')"]').innerHTML;
        toggleOptions();
    }

    // Close the custom dropdown if clicked outside
    document.addEventListener('click', function (e) {
        var container = document.querySelector('.custom-select-container');
        if (!container.contains(e.target)) {
            document.querySelector('.custom-options').style.display = 'none';
        }
    });
</script>

