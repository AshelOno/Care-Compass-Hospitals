<?php
// Include helpers and autoloaders
require_once(__DIR__ . '/src/helpers/autoloader.php');
require_once(__DIR__ . '/src/helpers/session_helper.php');
require_once(__DIR__ . '/src/helpers/validation_helper.php');

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    start_session(); // Change to session_start() if start_session is a custom function.
}

// Set the default page to 'home' if 'page' is not set in the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// List of pages that do not require header and footer
$excludeHeaderFooter = ['login', 'appointment'];

// Check if the page should include header and footer
$includeHeaderFooter = !in_array($page, $excludeHeaderFooter);

// Include the global header if required
if ($includeHeaderFooter) {
    include_once(__DIR__ . '/src/views/layout/header.php');
}

// Route handling based on the 'page' parameter
switch ($page) {

    case 'appointment':
        include_once(__DIR__ . '/src/views/appointments/create.php');
        break;

    case 'about':
        include_once(__DIR__ . '/src/views/about/about.php');
        break;

    case 'contact-us':
        include_once(__DIR__ . '/public/contact_us.php'); // Corrected the path to public folder
        break;

    case 'process-payment':
        include_once(__DIR__ . '/src/views/payments/process_payment.php');
        break;

    default:
        include_once(__DIR__ . '/src/views/home.php'); // Default to home page
        break;
}

// Include the global footer if required
if ($includeHeaderFooter) {
    include_once(__DIR__ . '/src/views/layout/footer.php');
}
?>
