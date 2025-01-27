<?php
require_once(__DIR__ . '/../helpers/db.php');
session_start();

class UserController {
    public function login($username, $password) {
        $db = new Database();
        $conn = $db->connect();

        $password = md5($password); // Encrypt password
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: /Care-Compass-Hospitals/index.php?page=dashboard");
        } else {
            echo "Invalid username or password.";
        }
    }
}
?>
