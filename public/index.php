<?php
// Load the autoloader to handle class imports
require_once '../src/helpers/autoloader.php';

// Load utility helpers (if needed for session, validation, etc.)
require_once '../src/helpers/session_helper.php';
require_once '../src/helpers/validation_helper.php';

// Routing logic
$page = $_GET['page'] ?? 'home';

// Include the global header
include '../src/views/layout/header.php';

// Route handling
switch ($page) {
    case 'login':
        include '../src/views/users/login.php';
        break;

    case 'schedule-appointment':
        include '../src/views/appointments/create.php';
        break;

    case 'about':
        include '../src/views/about/about.php';
        break;

    case 'contact-us':
        include '../src/views/about/contact_us.php';
        break;

    default:
        include '../src/views/about/about.php'; // Default to the about page
        break;
}

// Include the global footer
include '../src/views/layout/footer.php';
