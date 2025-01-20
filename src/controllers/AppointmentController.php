<?php
require_once __DIR__ . '/../config/database.php';

class AppointmentController {
    private $db;

    public function __construct() {
        // Establish a database connection
        $database = new Database();
        $this->db = $database->connect();
    }

    // Method to handle the creation of an appointment
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect form data
            $patientName = $_POST['patient_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $doctor = $_POST['doctor'];
            $specialization = $_POST['specialization'];
            $hospital = $_POST['hospital'];
            $appointmentDate = $_POST['date'];
            $appointmentTime = $_POST['time'];

            // Validate the inputs
            if (empty($patientName) || empty($phone) || empty($email) || empty($doctor) || empty($specialization) || empty($hospital) || empty($appointmentDate) || empty($appointmentTime)) {
                echo "All fields are required!";
                return;
            }

            // Check if phone number is valid (10 digits)
            if (!preg_match('/^[0-9]{10}$/', $phone)) {
                echo "Invalid phone number format!";
                return;
            }

            // Prepare the SQL query for inserting the appointment
            $query = "INSERT INTO appointments (patient_name, phone, email, doctor, specialization, hospital, appointment_date, appointment_time)
                      VALUES (:patient_name, :phone, :email, :doctor, :specialization, :hospital, :appointment_date, :appointment_time)";
            
            // Prepare the statement
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patient_name', $patientName);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':doctor', $doctor);
            $stmt->bindParam(':specialization', $specialization);
            $stmt->bindParam(':hospital', $hospital);
            $stmt->bindParam(':appointment_date', $appointmentDate);
            $stmt->bindParam(':appointment_time', $appointmentTime);

            // Execute the query and check if the insertion was successful
            if ($stmt->execute()) {
                echo "Appointment booked successfully!";
            } else {
                echo "Failed to book appointment.";
            }
        } else {
            // Render the create appointment form (for GET requests)
            include __DIR__ . '/../views/appointments/create.php';
        }
    }

    // Method to view appointments (optional, can be expanded)
    public function view() {
        $query = "SELECT * FROM appointments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // You can render a view to display the appointments, for example:
            include __DIR__ . '/../views/appointments/create.php';
    }
}
?>
