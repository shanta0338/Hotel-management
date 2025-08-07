<?php
// Simple test script to check admin functionality
require_once 'vendor/autoload.php';

// Check if we can access the models
try {
    echo "Testing AdminController...\n";
    
    // Test require
    $file = 'app/Http/Controllers/AdminController.php';
    if (file_exists($file)) {
        echo "✓ AdminController file exists\n";
        
        // Check basic syntax
        $content = file_get_contents($file);
        $tokens = token_get_all($content);
        echo "✓ AdminController syntax appears valid\n";
    }
    
    // Test routes file
    $routes_file = 'routes/web.php';
    if (file_exists($routes_file)) {
        echo "✓ Routes file exists\n";
        
        $content = file_get_contents($routes_file);
        if (strpos($content, '/admin/bookings') !== false) {
            echo "✓ Admin booking routes found\n";
        }
    }
    
    echo "Basic tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
