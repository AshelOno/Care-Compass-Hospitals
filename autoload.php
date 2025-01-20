<?php
spl_autoload_register(function ($class_name) {
    $directories = [
        __DIR__ . '/src/controllers/',
        __DIR__ . '/src/models/',
        __DIR__ . '/src/config/', 
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            include $file;
            return;
        }
    }

    throw new Exception("Class $class_name not found in autoload.");
});
