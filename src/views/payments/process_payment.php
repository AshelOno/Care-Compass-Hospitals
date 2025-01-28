<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <style>
        /* Form container */
        .container-form {
            background: white;
            color: black;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Form heading */
        .container-form h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #004080;
        }

        /* Form group styling */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #077294;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #25cc95;
        }

        /* Image container styling */
        .image-container {
            text-align: center;
            margin-bottom: 15px;
        }

        .image-container img {
            max-width: 75%;
            height: auto;
            border-radius: 5px;
        }

        /* Submit button */
        .btn-submit {
            background-color: #25cc95;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #077294;
        }

        /* Responsive design */
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }

            .container h1 {
                font-size: 20px;
            }

            .form-group input,
            .form-group select {
                font-size: 14px;
            }

            .btn-submit {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container-form">
        <h1>Make a Payment</h1>
        <form action="../../controllers/PaymentController.php" method="POST">
            <div class="form-group">
                <label for="payment_id">Payment ID:</label>
                <input type="text" name="payment_id" id="payment_id" placeholder="Enter Payment ID" required aria-label="Payment ID">
            </div>
            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="number" name="patient_id" id="patient_id" placeholder="Enter Patient ID" required aria-label="Patient ID">
            </div>
            <div class="form-group">
                <label for="appointment_id">Appointment ID:</label>
                <input type="number" name="appointment_id" id="appointment_id" placeholder="Enter Appointment ID" required aria-label="Appointment ID">
            </div>
            <div class="form-group">
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" name="amount_paid" id="amount_paid" step="0.01" placeholder="Enter Amount Paid" required aria-label="Amount Paid">
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" name="payment_date" id="payment_date" required aria-label="Payment Date">
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <div class="image-container">
                    <img src="../public/images/card.png" alt="Payment Methods">
                </div>
                <select name="payment_method" id="payment_method" required aria-label="Payment Method">
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

