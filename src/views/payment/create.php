<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
</head>
<body>
    <h1>Make a Payment</h1>
    <form action="../../controllers/PaymentController.php" method="POST">
        <label for="patient_id">Patient ID:</label>
        <input type="number" name="patient_id" id="patient_id" required>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" step="0.01" required>
        <br>
        <label for="payment_method">Payment Method:</label>
        <select name="payment_method" id="payment_method" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Cash">Cash</option>
        </select>
        <br>
        <button type="submit">Submit Payment</button>
    </form>
</body>
</html>
