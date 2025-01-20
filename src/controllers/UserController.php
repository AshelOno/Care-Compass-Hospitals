<?php
// Include the Database connection
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
        // Check if the login form was submitted
        if (isset($_POST['login'])) {
            // Get username and password from form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Prepare SQL query to fetch user data
            $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Check if a user was found
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Start a session and store user data
                    session_start();
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_type'] = $user['user_type'];

                    // Redirect to the dashboard or home page
                    header("Location: index.php?page=home");
                    exit();
                } else {
                    // Pass an error message if the password is incorrect
                    $error_message = "Invalid password!";
                    include __DIR__ . '/../views/users/login.php'; // Include the login view with the error
                    return;
                }
            } else {
                // Pass an error message if the username doesn't exist
                $error_message = "No user found with that username!";
                include __DIR__ . '/../views/users/login.php'; // Include the login view with the error
                return;
            }
        }

        // If the form wasn't submitted, just show the login page
        include __DIR__ . '/../views/users/login.php';
    }

}
