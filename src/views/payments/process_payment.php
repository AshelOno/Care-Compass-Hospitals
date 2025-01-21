<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Form container */
.container {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: center;
}

/* Form heading */
h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #007bff;
}

/* Form group styling */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-size: 14px;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input,
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus,
select:focus {
    border-color: #007bff;
}

/* Image container styling */
.image-container {
    text-align: center;
    margin-bottom: 15px;
}

.image-container img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

/* Submit button */
.btn-submit {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3;
}

/* Responsive design */
@media (max-width: 576px) {
    .container {
        padding: 15px;
    }

    h1 {
        font-size: 20px;
    }

    input,
    select {
        font-size: 14px;
    }

    .btn-submit {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Make a Payment</h1>
        <form action="../../controllers/PaymentController.php" method="POST">
            <div class="form-group">
                <label for="payment_id">Payment ID:</label>
                <input type="text" name="payment_id" id="payment_id" placeholder="Enter Payment ID" required>
            </div>
            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="number" name="patient_id" id="patient_id" placeholder="Enter Patient ID" required>
            </div>
            <div class="form-group">
                <label for="appointment_id">Appointment ID:</label>
                <input type="number" name="appointment_id" id="appointment_id" placeholder="Enter Appointment ID" required>
            </div>
            <div class="form-group">
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" name="amount_paid" id="amount_paid" step="0.01" placeholder="Enter Amount Paid" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" name="payment_date" id="payment_date" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <!-- Image above payment method -->
                <div class="image-container">
                    <img src="public/images/payment_methods.jpg" alt="Payment Methods">
                </div>
                <select name="payment_method" id="payment_method" required>
                    <option value="" disabled selected>Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
