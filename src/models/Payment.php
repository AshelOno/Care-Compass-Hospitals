<?php

class Payment
{
    private $conn;
    private $table = 'payments';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Process a new payment
    public function process($patient_id, $amount, $payment_method, $status = 'Successful')
    {
        $query = "INSERT INTO {$this->table} (patient_id, amount, payment_method, status) 
                  VALUES (:patient_id, :amount, :payment_method, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':patient_id', $patient_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    // Get all payments
    public function getAll()
    {
        $query = "SELECT p.*, u.username AS patient_name 
                  FROM {$this->table} p
                  JOIN users u ON p.patient_id = u.user_id";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get payment details by ID
    public function getById($payment_id)
    {
        $query = "SELECT * FROM {$this->table} WHERE payment_id = :payment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':payment_id', $payment_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
