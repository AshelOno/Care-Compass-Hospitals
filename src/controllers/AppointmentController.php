<?php
require_once __DIR__ . '/../config/database.php';

class AppointmentController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logic for creating an appointment
            $patientId = $_POST['patient_id'];
            $doctorId = $_POST['doctor_id'];
            $appointmentDate = $_POST['appointment_date'];
            $appointmentTime = $_POST['appointment_time'];

            // Example query (replace with actual logic based on your database schema)
            $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time)
                      VALUES (:patient_id, :doctor_id, :appointment_date, :appointment_time)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patient_id', $patientId);
            $stmt->bindParam(':doctor_id', $doctorId);
            $stmt->bindParam(':appointment_date', $appointmentDate);
            $stmt->bindParam(':appointment_time', $appointmentTime);

            if ($stmt->execute()) {
                echo "Appointment created successfully!";
            } else {
                echo "Failed to create appointment.";
            }
        } else {
            // Render the create appointment view
            include '../views/appointments/create.php';
        }
    }

    public function view() {
        // Logic for viewing appointments (optional)
    }
}
?>
