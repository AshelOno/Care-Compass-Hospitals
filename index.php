<?php
require_once 'autoload.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;

    case 'schedule-appointment':
        $controller = new AppointmentController();
        $controller->create();
        break;

    case 'process-payment':
        $controller = new PaymentController();
        $controller->process();
        break;

    default:
    include __DIR__ . '/src/views/layout/header.php'; 
    include __DIR__ . '/public/index.html';
    include __DIR__ . '/src/views/layout/footer.php'; 
        
}
?>

