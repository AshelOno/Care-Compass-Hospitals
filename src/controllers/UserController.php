<?php
require_once __DIR__ . '/../config/database.php';

class UserController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logic for handling login
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Example query (implement actual logic based on your database schema)
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Login successful!";
            } else {
                echo "Invalid username or password.";
            }
        } else {
            include '../views/users/login.php';
        }
    }

    public function register() {
        // Add your register logic here
    }
}
?>
