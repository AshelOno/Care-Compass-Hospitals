<?php
// Ensure correct autoloading of classes
require_once __DIR__ . '/src/autoload.php';  // Correct path to autoload.php

// Get the requested page or default to 'home'
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        // Handle login
        $controller = new UserController();
        $controller->login();
        break;

    case 'appointment':
        // Handle appointment scheduling
        $controller = new AppointmentController();
        $controller->create();
        break;

    case 'process-payment':
        // Handle payment processing
        $controller = new PaymentController();
        $controller->process();
        break;

    default:
        // Default case (home page)
        include __DIR__ . '/src/views/layout/header.php'; 
        include __DIR__ . '/public/index.html'; 
        include __DIR__ . '/src/views/layout/footer.php'; 
        break;
}
?>
