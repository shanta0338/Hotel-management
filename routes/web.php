<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/create_room', [AdminController::class, 'create_room'])->name('create_room');
Route::post('/add_room', [AdminController::class, 'add_room'])->name('add_room');
Route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');
Route::get('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('edit_room');
Route::post('/update_room/{id}', [AdminController::class, 'update_room'])->name('update_room');
Route::get('/room_delete/{id}', [AdminController::class, 'delete_room'])->name('room_delete');