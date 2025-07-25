<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        // Get available rooms for public display (limit to 6 rooms for homepage)
        $rooms = Room::where('status', 'available')
                     ->orderBy('created_at', 'desc')
                     ->limit(6)
                     ->get();
        
        return view('home.index', compact('rooms'));
    }
}
