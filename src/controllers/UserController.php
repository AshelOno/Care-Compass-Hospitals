<?php

require_once __DIR__ . '/../config/database.php';

class UserController
{
    private $db;

    public function __construct()
    {
        // Create an instance of the Database class
        $database = new Database();
        $this->db = $database->connect();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capture form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Prepare query to check user credentials
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($query);

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            // Execute the query
            $stmt->execute();

            // Check if user exists
            if ($stmt->rowCount() > 0) {
                echo "Login successful!";
                // Redirect or store session data as needed
            } else {
                echo "Invalid username or password.";
            }
        } else {
            include '../views/users/login.php'; // Include login form view
        }
    }
}
