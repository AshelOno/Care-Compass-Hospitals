<?php
// Include necessary helpers and autoloaders
require_once(__DIR__ . '/../src/helpers/autoloader.php');
require_once(__DIR__ . '/../src/helpers/session_helper.php');
require_once(__DIR__ . '/../src/helpers/validation_helper.php');

// Routing logic
$page = $_GET['page'] ?? 'home'; // Default to 'home' if no page is specified

// Check if the page should include header and footer
$includeHeaderFooter = !in_array($page, ['login', 'appointment']); // Exclude 'login' and 'appointment'

// Include the global header if required
if ($includeHeaderFooter) {
    include_once(__DIR__ . '/../src/views/layout/header.php');
}

// Route handling based on the 'page' parameter
switch ($page) {
    case 'login':
        include_once(__DIR__ . '/../src/views/users/login.php');
        break;

    case 'appointment':
        include_once(__DIR__ . '/../src/views/appointments/create.php');
        break;

    case 'about':
        include_once(__DIR__ . '/../src/views/about/about.php');
        break;

    case 'contact-us':
        include_once(__DIR__ . '/../src/views/about/contact_us.php');
        break;

    case 'process-payment':
        include_once(__DIR__ . '/../src/views/payments/process_payment.php');
        break;

    default:
        include_once(__DIR__ . '/../public/index.html'); // Default to the About page
        break;
}

// Include the global footer if required
if ($includeHeaderFooter) {
    include_once(__DIR__ . '/../src/views/layout/footer.php');
}
