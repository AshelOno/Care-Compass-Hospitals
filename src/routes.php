<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        (new UserController())->login();
        break;

    case 'schedule-appointment':
        (new AppointmentController())->create();
        break;

    case 'process-payment':
        (new PaymentController())->process();
        break;

    default:
        include '../src/views/layout/header.php';
        include '../src/views/about/about.php';
        include '../src/views/layout/footer.php';
}
