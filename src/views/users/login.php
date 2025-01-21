<?php
// Check if there's an error message (if any)
$error_message = isset($error_message) ? $error_message : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
        }

        .container {
            background: #ffffff;
            padding: 30px 25px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 420px;
            animation: fadeIn 1s ease-in-out;
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
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input,
        .input-container select {
            width: 100%;
            padding: 12px 15px;
            padding-left: 50px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 14px;
            background: #f9f9f9;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .input-container input:focus,
        .input-container select:focus {
            outline: none;
            border-color: #25cc95;
            box-shadow: 0 0 5px rgba(37, 204, 149, 0.8);
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
    </style>

</head>

<body>
    <div class="container">
        <button class="home-btn" onclick="window.location.href='index.php';">Home</button>
        <h2 class="text-center mt-4">Login</h2>

        <?php if (!empty($error_message)) { echo '<p class="error-message">'.$error_message.'</p>'; } ?>

        <form method="POST" action="login.php">
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

        <p class="text-center mt-3">Don't have an account? <a href="index.php?page=register">Register here</a></p>
    </div>
</body>

</html>
