<?php
<<<<<<< HEAD
// Define the base path of the project for easy path management
=======
>>>>>>> 2b91b1af9c357ceaa6329ea7000324a4bd986524
define('BASE_PATH', dirname(__DIR__) . '/');

class Database
{
    private $host = 'localhost';
    private $db_name = 'care_compass';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}


