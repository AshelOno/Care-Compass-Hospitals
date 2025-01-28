<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection configuration
include_once(__DIR__ . '/../../config.php');

// Create an instance of the Database class
$database = new Database();
$conn = $database->connect();

// Check if $conn is set and is a valid object
if (!$conn) {
    die("Connection failed: Database connection not established.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $message = $_POST['message'];

    // Prepare and bind the SQL query to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, phone, address1, address2, city, country, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $phone);
    $stmt->bindParam(4, $address1);
    $stmt->bindParam(5, $address2);
    $stmt->bindParam(6, $city);
    $stmt->bindParam(7, $country);
    $stmt->bindParam(8, $message);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Thank you for contacting us. We will get back to you shortly!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

    // Close the statement
    $stmt = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* General Styling */
        .contact body {
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
        }

        /* Contact Us Section */
        .contact-us {
            padding: 50px 20px;
            color: white;
            background: url('../public/images/healthcare-people-group-professi.jpg') no-repeat center center / cover;
            text-align: center;
            position: relative;
        }

        .contact-us::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .contact-header {
            position: relative;
            z-index: 1;
        }

        .contact-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .contact-header p {
            font-size: 1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Contact Details Section */
        .contact-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            padding: 50px 20px;
            color: white;
            background: url('../public/images/index_bg.jpg') no-repeat center bottom;
            background-size: cover;
            text-align: center;
        }

        .location {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            flex-grow: 1;
            margin: 10px;
        }

        .location h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        /* Contact Form Section */
        .contact-form {
            background: white;
            color: black;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .contact-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00667c;
        }

        .contact-form p {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: #aaa;
        }

        .contact-form button {
            padding: 10px 20px;
            border: none;
            background-color: #ffcc00;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #ff9900;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .contact-details {
                flex-direction: column;
            }

            .location {
                max-width: 100%;
            }

            .contact-header h1 {
                font-size: 2rem;
            }

            .contact-header p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="contact">
    <!-- Contact Us Header Section -->
    <section class="contact-us">
        <div class="contact-header">
            <h1>CONTACT US</h1>
            <p>We are committed to improving our service and scaling new heights each year.<br>We welcome your valuable
                advice and feedback to serve you better.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form">
        <h2>Contact Care Compass Hospitals</h2>
        <p>Please complete the form below, so we can provide quick and efficient service.</p>
        <form action="contact_us.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Full Name (required)" required aria-label="Full Name">
            <input type="email" id="email" name="email" placeholder="Email (required)" required aria-label="Email">
            <input type="tel" id="phone" name="phone" placeholder="Phone" aria-label="Phone">
            <input type="text" id="address1" name="address1" placeholder="Address Line 1" aria-label="Address Line 1">
            <input type="text" id="address2" name="address2" placeholder="Address Line 2" aria-label="Address Line 2">
            <input type="text" id="city" name="city" placeholder="City" aria-label="City">
            <input type="text" id="country" name="country" placeholder="Country" aria-label="Country">
            <textarea id="message" name="message" rows="5" placeholder="Message (required)" required aria-label="Message"></textarea>
            <button type="submit">SEND</button>
        </form>
    </section>

        <!-- Contact Details Section -->
        <section class="contact-details">
        <div class="location">
            <h2>CARE COMPASS HOSPITAL</h2>
            <p><strong>KANDY</strong></p>
            <p>389, Nugegoda Road, Kandy.</p>
            <p>0117 888 888</p>
            <p>info@carecompasshospitals.com</p>
        </div>
        <div class="location">
            <h2>CARE COMPASS HOSPITAL</h2>
            <p><strong>COLOMBO</strong></p>
            <p>647/2a, Pannipitiya Road, Colombo.</p>
            <p>0117 888 888</p>
            <p>info@carecompasshospitals.com</p>
        </div>
        <div class="location">
            <h2>CARE COMPASS HOSPITAL</h2>
            <p><strong>KURUNAGALLA</strong></p>
            <p>647/2a, Pannala Road, kurunagalla.</p>
            <p>0117 888 888</p>
            <p>info@carecompasshospitals.com</p>
        </div>
    </section>
    </div>
</body>
</html>

