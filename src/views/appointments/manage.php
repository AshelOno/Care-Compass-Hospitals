<?php
include_once '../../config/database.php';

$query = "SELECT a.*, u.username AS patient_name, d.name AS doctor_name 
          FROM appointments a 
          JOIN users u ON a.patient_id = u.user_id 
          JOIN doctors d ON a.doctor_id = d.doctor_id";
$stmt = $conn->prepare($query);
$stmt->execute();
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
</head>
<body>
    <h1>Manage Appointments</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?php echo $appointment['appointment_id']; ?></td>
                    <td><?php echo $appointment['patient_name']; ?></td>
                    <td><?php echo $appointment['doctor_name']; ?></td>
                    <td><?php echo $appointment['appointment_date']; ?></td>
                    <td><?php echo $appointment['appointment_time']; ?></td>
                    <td><?php echo $appointment['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
