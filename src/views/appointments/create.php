<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Column Appointment Form</title>
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
            z-index: 1200;
            justify-content: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }    

        .container {
            width: 90%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            position: relative;
            width: calc(50% - 20px); /* Two columns with spacing */
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #00667c;
        }

        select, input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1a4d80;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #2869aa;
        }

        /* Full-width for single-column fields */
        .form-group.full-width {
            width: 100%;
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
            .form-group {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <!-- Logo Section -->
            <img src="public/images/healthcare.jpg" alt="Care Compass Hospitals Logo" class="logo"> 
            <h1>Care Compass Hospitals</h1>
        </header>

        <!-- Discount Section -->
        <div class="discount">
            Save up to Rs. 400/=
        </div>

        <h2>Book Your Appointment</h2>
        <form action="appointment.html" method="POST">
            <!-- Patient's Name -->
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" id="patient_name" name="patient_name" maxlength="100" required placeholder="Enter Patient's Name">
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <i class="fas fa-phone-alt"></i>
                <input type="tel" id="phone" name="phone" required placeholder="Enter Phone Number" pattern="^[0-9]{10}$">
            </div>

            <!-- Email -->
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" required placeholder="Enter Email Address">
            </div>

            <!-- Doctor's Name -->
            <div class="form-group">
                <i class="fas fa-user-md"></i>
                <input type="text" id="doctor" name="doctor" maxlength="50" required placeholder="Enter Doctor's Name">
            </div>

            <!-- Specialization -->
            <div class="form-group">
                <i class="fas fa-cogs"></i>
                <select id="specialization" name="specialization" required>
                    <option value="cardiologist">Cardiologist</option>
                    <option value="neurologist">Neurologist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="orthopedist">Orthopedist</option>
                    <option value="pediatrician">Pediatrician</option>
                    <option value="general">General</option>
                </select>
            </div>

            <!-- Hospital Name -->
            <div class="form-group">
                <i class="fas fa-hospital"></i>
                <input type="text" id="hospital" name="hospital" required placeholder="Enter Hospital Name">
            </div>

            <!-- Date -->
            <div class="form-group">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" id="date" name="date" required>
            </div>

            <!-- Time -->
            <div class="form-group">
                <i class="fas fa-clock"></i>
                <input type="time" id="time" name="time" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group full-width">
                <button type="submit">Book Appointment</button>
            </div>
        </form>
    </div>
</body>
</html>
