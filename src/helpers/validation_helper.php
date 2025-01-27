<?php
function sanitize_input($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_password($password, $minLength = 8) {
    return strlen($password) >= $minLength;
}

function validate_username($username) {
    return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
}

function validate_phone($phone) {
    return preg_match('/^0\d{9}$/', $phone); // Example for a 10-digit phone number starting with '0'
}
?>
