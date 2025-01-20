<?php

class Appointment
{
    private $conn;
    private $table = 'appointments';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Schedule a new appointment
    public function schedule($patient_id, $doctor_id, $appointment_date, $appointment_time)
    {
        $query = "INSERT INTO {$this->table} (patient_id, doctor_id, appointment_date, appointment_time) 
                  VALUES (:patient_id, :doctor_id, :appointment_date, :appointment_time)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':patient_id', $patient_id);
        $stmt->bindParam(':doctor_id', $doctor_id);
        $stmt->bindParam(':appointment_date', $appointment_date);
        $stmt->bindParam(':appointment_time', $appointment_time);

        return $stmt->execute();
    }

    // Get all appointments
    public function getAll()
    {
        $query = "SELECT a.*, u.username AS patient_name, d.name AS doctor_name 
                  FROM {$this->table} a
                  JOIN users u ON a.patient_id = u.user_id
                  JOIN doctors d ON a.doctor_id = d.doctor_id";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update appointment status
    public function updateStatus($appointment_id, $status)
    {
        $query = "UPDATE {$this->table} SET status = :status WHERE appointment_id = :appointment_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':appointment_id', $appointment_id);

        return $stmt->execute();
    }
}
