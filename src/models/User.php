<?php
 require_once __DIR__ . '/../config/database.php';

class User
{
    private $conn;
    private $table = 'users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create a new user
    public function create($username, $email, $password, $role)
    {
        $query = "INSERT INTO {$this->table} (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    // Get all users
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single user by ID
    public function getById($user_id)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
