<?php

// Correctly include the Database class
require_once '../config/database.php';

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
        // Login logic
    }
}
