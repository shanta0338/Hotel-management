<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about_us', [HomeController::class, 'aboutUs'])->name('about_us');
Route::get('/our_rooms', [HomeController::class, 'ourRooms'])->name('our_rooms');
Route::get('/room-details/{id}', [HomeController::class, 'roomDetails'])->name('room.details');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact_us', [ContactController::class, 'index'])->name('contact_us');
Route::post('/contact_us', [ContactController::class, 'store'])->name('contact.submit');
Route::get('/test/contact', function() {
    return view('test.contact');
})->name('test.contact');
Route::get('/test/contact-test', function() {
    return view('test.contact-test');
})->name('test.contact-test');
Route::get('/test/database-viewer', function() {
    return view('test.database-viewer');
})->name('test.database-viewer');
Route::get('/test/diagnostics', function() {
    return view('test.diagnostics');
})->name('test.diagnostics');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Booking routes
Route::get('/room/{id}/book', [HomeController::class, 'bookingForm'])->name('room.book');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');

// User booking management routes
Route::middleware('auth')->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');
    Route::put('/booking/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('booking.cancel');
});

// Simple test route to check if booking functionality works
Route::get('/test-bookings', function() {
    return 'Booking routes are working!';
});

// Test route to check room availability
Route::get('/test-availability/{roomId}', function($roomId) {
    $room = \App\Models\Room::find($roomId);
    if (!$room) {
        return "Room not found";
    }
    
    $activeBookings = \App\Models\Booking::where('room_id', $roomId)
        ->whereIn('status', ['pending', 'confirmed'])
        ->get();
    
    $allBookings = \App\Models\Booking::where('room_id', $roomId)->get();
    
    return [
        'room' => $room->room_title,
        'active_bookings' => $activeBookings->count(),
        'total_bookings' => $allBookings->count(),
        'cancelled_bookings' => $allBookings->where('status', 'cancelled')->count(),
        'is_available' => $activeBookings->count() === 0,
        'active_booking_details' => $activeBookings->map(function($b) {
            return $b->check_in . ' to ' . $b->check_out . ' (' . $b->status . ')';
        })
    ];
});

// Test route for debugging our_rooms
Route::get('/test-our-rooms', function() {
    try {
        $start_time = microtime(true);
        
        echo "<h2>Testing Our Rooms Page Loading</h2>";
        echo "<p>Starting test at: " . date('Y-m-d H:i:s') . "</p>";
        
        // Test database connection
        echo "<p>1. Testing database connection...</p>";
        $room_count = App\Models\Room::count();
        echo "<p>✓ Database connected. Room count: $room_count</p>";
        
        // Test getting rooms
        echo "<p>2. Testing room retrieval...</p>";
        $rooms = App\Models\Room::orderBy('created_at', 'desc')->get();
        echo "<p>✓ Rooms retrieved successfully. Count: " . $rooms->count() . "</p>";
        
        // Test individual room data
        echo "<p>3. Testing room data integrity...</p>";
        foreach($rooms->take(3) as $room) {
            echo "<p>   - Room: " . $room->room_title . " (ID: " . $room->id . ")</p>";
        }
        
        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time) * 1000; // Convert to milliseconds
        
        echo "<p><strong>Test completed in: " . round($execution_time, 2) . " ms</strong></p>";
        echo "<p><a href='/our_rooms'>→ Go to Our Rooms page</a></p>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
})->name('test.our.rooms');

// Test route to check database
Route::get('/test-db', function() {
    try {
        $rooms = App\Models\Room::count();
        $roomList = App\Models\Room::all(['id', 'room_title', 'price']);
        
        $output = "Database connection working!<br>";
        $output .= "Room count: " . $rooms . "<br><br>";
        $output .= "Rooms:<br>";
        
        foreach($roomList as $room) {
            $output .= "- " . $room->room_title . " ($" . $room->price . ") <a href='/room-details/" . $room->id . "'>View Details</a><br>";
        }
        
        return $output;
    } catch (Exception $e) {
        return "Database error: " . $e->getMessage();
    }
})->name('test.db');

// Test room details route  
Route::get('/test-room-details/{id}', function($id) {
    try {
        $room = App\Models\Room::find($id);
        if (!$room) {
            return "Room ID $id not found";
        }
        
        $output = "<h2>Room Details Test</h2>";
        $output .= "<p><strong>ID:</strong> " . $room->id . "</p>";
        $output .= "<p><strong>Title:</strong> " . $room->room_title . "</p>";
        $output .= "<p><strong>Price:</strong> $" . number_format($room->price, 2) . "</p>";
        $output .= "<p><strong>Type:</strong> " . ($room->room_type ?: 'Not set') . "</p>";
        $output .= "<p><strong>Capacity:</strong> " . ($room->capacity ?: 'Not set') . "</p>";
        $output .= "<p><strong>WiFi:</strong> " . ($room->wifi ? 'Yes' : 'No') . "</p>";
        $output .= "<p><strong>Description:</strong> " . ($room->description ?: 'Not set') . "</p>";
        $output .= "<br><a href='/room-details/" . $room->id . "'>View Full Details Page</a>";
        $output .= "<br><a href='/test-db'>Back to Test Page</a>";
        
        return $output;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
})->name('test.room.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Admin routes - protected by authentication
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/create_room', [AdminController::class, 'create_room'])->name('create_room');
    Route::post('/add_room', [AdminController::class, 'add_room'])->name('add_room');
    Route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');
    Route::get('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('edit_room');
    Route::post('/update_room/{id}', [AdminController::class, 'update_room'])->name('update_room');
    Route::get('/room_delete/{id}', [AdminController::class, 'delete_room'])->name('room_delete');
    
    // Contact management routes
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts');
    Route::get('/admin/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::post('/admin/contacts/{id}/reply', [ContactController::class, 'markAsReplied'])->name('admin.contacts.reply');
});

