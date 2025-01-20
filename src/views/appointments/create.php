<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
</head>
<body>
    <h1>Schedule an Appointment</h1>
    <form action="../../controllers/AppointmentController.php" method="POST">
        <label for="patient_id">Patient ID:</label>
        <input type="number" name="patient_id" id="patient_id" required>
        <br>
        <label for="doctor_id">Doctor ID:</label>
        <input type="number" name="doctor_id" id="doctor_id" required>
        <br>
        <label for="appointment_date">Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" required>
        <br>
        <label for="appointment_time">Time:</label>
        <input type="time" name="appointment_time" id="appointment_time" required>
        <br>
        <button type="submit">Schedule Appointment</button>
    </form>
</body>
</html>
