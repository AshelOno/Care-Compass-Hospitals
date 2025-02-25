<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection configuration
include('src\config.php');

// Create an instance of the Database class
$database = new Database();
$conn = $database->connect();

// Check if $conn is set and is a valid object
if (!$conn) {
    die("Connection failed: Database connection not established.");
}

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
                $_SESSION['error'] = "All fields are required!";
                header("Location: /appointment-form.php"); // Redirect back to the form
                exit();
            }

            // Check if phone number is valid (10 digits)
            if (!preg_match('/^[0-9]{10}$/', $phone)) {
                $_SESSION['error'] = "Invalid phone number format!";
                header("Location: /appointment-form.php");
                exit();
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
                $_SESSION['success'] = "Appointment booked successfully!";
                header("Location: /appointment-confirmation.php"); // Redirect to a confirmation page
                exit();
            } else {
                $_SESSION['error'] = "Failed to book appointment. Please try again.";
                header("Location: /appointment-form.php"); // Redirect back to the form
                exit();
            }
        } else {
            // Render the create appointment form (for GET requests)
            include __DIR__ . '/../views/appointments/create.php';
        }
    }

    // Method to view appointments (optional, can be expanded)
    public function view() {
        // Fetch all appointments from the database
        $query = "SELECT * FROM appointments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Fetch results as an associative array
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Render the view (for example, a list of appointments)
        include __DIR__ . '/../views/appointments/view.php';
    }
}
?>
