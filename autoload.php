<?php
// Autoload function for loading classes dynamically
spl_autoload_register(function ($class_name) {
    // Check in the controllers directory
    $file = 'src/controllers/' . $class_name . '.php';
    if (file_exists($file)) {
        include $file;
        return;
    }

    // Check in the models directory
    $file = 'src/models/' . $class_name . '.php';
    if (file_exists($file)) {
        include $file;
        return;
    }

    // Check in the config directory
    $file = 'src/config/' . $class_name . '.php';
    if (file_exists($file)) {
        include $file;
        return;
    }

    // Optionally, you can handle the case where the class file is not found
    throw new Exception("Class $class_name not found.");
});
