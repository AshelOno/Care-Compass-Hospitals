<?php
// Autoload all classes from the 'src' directory
spl_autoload_register(function ($class) {
    // Convert namespace (if any) and class names into a file path
    $classPath = __DIR__ . '/controllers/' . $class . '.php';
    
    if (file_exists($classPath)) {
        require_once $classPath;
    } else {
        echo "Class $class not found!";
    }
});
?>
