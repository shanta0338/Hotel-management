<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing routes:\n";

try {
    echo "Our Rooms: " . route('our_rooms') . "\n";
    echo "About Us: " . route('about_us') . "\n";
    echo "Gallery: " . route('gallery') . "\n";
    echo "Contact Us: " . route('contact_us') . "\n";
    echo "Blog: " . route('blog') . "\n";
    echo "All routes are working!\n";
} catch (Exception $e) {
    echo "Route error: " . $e->getMessage() . "\n";
}
