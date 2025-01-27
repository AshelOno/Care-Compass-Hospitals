<?php
function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: index.php?page=login');
        exit();
    }
}

function logout() {
    session_unset();
    session_destroy();
    header('Location: index.php?page=login');
    exit();
}
?>
