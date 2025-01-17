<?php
session_start();
include '../db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $doctor_name = $_POST['doctor'];
    $specialization = $_POST['specialization'];
    $hospital_name = $_POST['hospital'];
    $appointment_date = $_POST['date'];

    // Prepare SQL query to insert data into the table
    $sql = "INSERT INTO appointments (doctor_name, specialization, hospital_name, appointment_date)
            VALUES ('$doctor_name', '$specialization', '$hospital_name', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Appointment booked successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9e8ec;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        header {
            display: flex;
            align-items: center;
            color: #00667c;
            position: sticky;
            top: 0;
            z-index: 1000;
            justify-content: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 10px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #00667c;
        }
        select, input, button {
            width: 100%;
            padding: 10px 10px 10px 35px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #1a4d80;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
            padding: 12px;
        }
        button:hover {
            background-color: #2869aa;
        }
        .discount {
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .ongoing-consultation {
            margin-top: 20px;
            text-align: center;
        }
        .ongoing-consultation a {
            color: #007BFF;
            text-decoration: none;
            font-size: 18px;
        }
        /* Mobile responsiveness */
        @media (max-width: 600px) {
            header img {
                width: 40px;
                height: 40px;
            }
            .container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <!-- Logo Section -->
            <img src="../uploads/healthcare.jpg" alt="Care Compass Hospitals Logo" class="logo"> 
            <h1>Care Compass Hospitals</h1>
        </header>

        <!-- Discount Section -->
        <div class="discount">
            Save up to Rs. 400/=
        </div>

        <h2>Book Your Appointment</h2>
        
        <!-- Appointment Form -->
        <form action="appointment.html" method="POST">
            <!-- Doctor's Name -->
            <div class="form-group">
                <i class="fas fa-user-md"></i>
                <input type="text" id="doctor" name="doctor" maxlength="20" required placeholder="Enter Doctor's Name">
            </div>

            <!-- Specialization -->
            <div class="form-group">
                <i class="fas fa-cogs"></i>
                <select type="option" id="specialization" name="specialization" required placeholder="Any Specialization">
                    <option value="cardiologist">Cardiologist</option>
                    <option value="neurologist">Neurologist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="orthopedist">Orthopedist</option>
                    <option value="pediatrician">Pediatrician</option>
                    <option value="general">General</option>
                </select>
            </div>

            <!-- Hospital -->
            <div class="form-group">
                <i class="fas fa-hospital"></i>
                <input type="text" id="hospital" name="hospital" required placeholder="Enter Hospital Name">
            </div>

            <!-- Date -->
            <div class="form-group">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" id="date" name="date" required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Book Appointment</button>
        </form>

        <!-- Ongoing Consultation Link -->
        <div class="ongoing-consultation">
            <p>View your <a href="ongoing-consultations.html">Ongoing Consultations</a></p>
        </div>
    </div>

</body>
</html>
