<?php

// Validate if a string is not empty
function validateRequired($field) {
    return !empty(trim($field));
}

// Validate if an email is valid
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validate phone number format
function validatePhoneNumber($phone) {
    return preg_match('/^0\d{9}$/', $phone);
}
