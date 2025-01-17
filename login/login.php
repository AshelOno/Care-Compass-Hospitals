<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role_id'] = $user['role_id'];
    
        switch ($user['role_id']) {
            case 1:
                header("Location: admin_dashboard.php");
                break;
            case 2:
                header("Location: staff_dashboard.php");
                break;
            case 3:
                header("Location: patient_dashboard.php");
                break;
        }
        exit;
    } else {
        echo "Invalid username or password.";
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
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>

 <style>
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
                    <select id="role" name="role" hidden>
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
                <button type="submit" class="btn btn-primary" onclick="validateLoginForm()">Login</button>
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

