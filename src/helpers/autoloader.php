<?php
spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../'; // Adjust based on your structure

    // Define the directories to search for classes
    $directories = [
        'models/',
        'controllers/',
        'services/',
    ];

    foreach ($directories as $directory) {
        $filePath = $baseDir . $directory . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }

    // If not found, throw an error
    throw new Exception("Class $className not found.");
});
?>
