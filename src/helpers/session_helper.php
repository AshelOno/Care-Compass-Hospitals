<?php

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Helper to set flash messages
function setFlashMessage($key, $message) {
    $_SESSION[$key] = $message;
}

// Helper to retrieve flash messages
function getFlashMessage($key) {
    if (isset($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $message;
    }
    return null;
}
