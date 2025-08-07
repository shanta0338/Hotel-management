<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Http\Kernel');

// Test different routes
$routes_to_test = [
    '/our_rooms',
    '/about_us', 
    '/gallery',
    '/contact_us',
    '/blog'
];

foreach ($routes_to_test as $route) {
    try {
        $request = Illuminate\Http\Request::create($route, 'GET');
        $response = $kernel->handle($request);
        
        echo "Route: $route - Status: " . $response->getStatusCode() . "\n";
        
        if ($response->getStatusCode() !== 200) {
            echo "  Error: " . $response->getContent() . "\n";
        } else {
            echo "  Success: Page loads correctly\n";
        }
        
    } catch (Exception $e) {
        echo "Route: $route - Error: " . $e->getMessage() . "\n";
    }
}
