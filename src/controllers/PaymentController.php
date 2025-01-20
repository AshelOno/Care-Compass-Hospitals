<?php
require_once __DIR__ . '/../config/database.php';

class PaymentController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function process() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logic for processing payments
            $patientId = $_POST['patient_id'];
            $amount = $_POST['amount'];
            $paymentMethod = $_POST['payment_method'];

            // Example query (replace with actual logic based on your database schema)
            $query = "INSERT INTO payments (patient_id, amount, payment_method)
                      VALUES (:patient_id, :amount, :payment_method)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patient_id', $patientId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':payment_method', $paymentMethod);

            if ($stmt->execute()) {
                echo "Payment processed successfully!";
            } else {
                echo "Failed to process payment.";
            }
        } else {
            // Render the payment form view
            include '../views/payments/process.php';
        }
    }

    public function view() {
        // Logic for viewing payment records (optional)
    }
}
?>
