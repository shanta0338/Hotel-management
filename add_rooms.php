<?php

// Test script to add sample rooms
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Room;

try {
    echo "Testing database connection...\n";
    
    // Check if rooms table exists and has data
    $roomCount = Room::count();
    echo "Current rooms in database: $roomCount\n";
    
    if ($roomCount == 0) {
        echo "Adding sample rooms...\n";
        
        // Create sample rooms
        $rooms = [
            [
                'room_title' => 'Deluxe Ocean View',
                'description' => 'Spacious room with beautiful ocean view, king bed, and modern amenities.',
                'price' => 150.00,
                'room_type' => 'deluxe',
                'wifi' => true,
                'status' => 'available',
                'capacity' => 2
            ],
            [
                'room_title' => 'Standard Twin Room',
                'description' => 'Comfortable room with twin beds, perfect for business travelers.',
                'price' => 80.00,
                'room_type' => 'standard',
                'wifi' => true,
                'status' => 'available',
                'capacity' => 2
            ],
            [
                'room_title' => 'Luxury Suite',
                'description' => 'Premium suite with living area, jacuzzi, and panoramic city view.',
                'price' => 300.00,
                'room_type' => 'suite',
                'wifi' => true,
                'status' => 'available',
                'capacity' => 4
            ]
        ];
        
        foreach ($rooms as $roomData) {
            Room::create($roomData);
            echo "Created room: {$roomData['room_title']}\n";
        }
        
        echo "Sample rooms added successfully!\n";
    } else {
        echo "Rooms already exist in database.\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Make sure XAMPP MySQL is running and the 'hotel' database exists.\n";
}
