<?php
// Start the session to handle flash messages
session_start();

// Include the database connection and AppointmentController
include_once(__DIR__ . '/../../config.php');
include_once(__DIR__ . '/../../controllers/AppointmentController.php');

// Create an instance of the AppointmentController
$appointmentController = new AppointmentController();

// Fetch all appointments
$appointments = $appointmentController->view();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="/assets/css/style.css"> <!-- Link to your CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> <!-- Bootstrap (optional) -->
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Appointments List</h2>

    <?php
    // Display success or error messages
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']); // Clear message after displaying
    }
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Clear message after displaying
    }
    ?>

    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Hospital</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $index => $appointment): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($appointment['patient_name']); ?></td>
                        <td><?= htmlspecialchars($appointment['phone']); ?></td>
                        <td><?= htmlspecialchars($appointment['email']); ?></td>
                        <td><?= htmlspecialchars($appointment['doctor']); ?></td>
                        <td><?= htmlspecialchars($appointment['specialization']); ?></td>
                        <td><?= htmlspecialchars($appointment['hospital']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_time']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No appointments found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/appointment-form.php" class="btn btn-primary">Book New Appointment</a>
</div>

</body>
</html>
