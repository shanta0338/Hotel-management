<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                return view('home.index');
            } else if ($usertype == 'admin') {
                // Redirect admin users directly to view rooms page
                return redirect()->route('view_room');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function home()
    {
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function view_room()
    {
        try {
            // Get all rooms from database with proper error handling
            $data = Room::orderBy('created_at', 'desc')->get();
            
            // Calculate statistics
            $stats = [
                'total_rooms' => $data->count(),
                'available_rooms' => $data->where('status', 'available')->count(),
                'occupied_rooms' => $data->where('status', 'occupied')->count(),
                'maintenance_rooms' => $data->where('status', 'maintenance')->count(),
                'total_capacity' => $data->sum('capacity'),
                'average_price' => $data->avg('price'),
                'wifi_enabled' => $data->where('wifi', 1)->count(),
            ];
            
            // Log for debugging
            Log::info('Rooms retrieved: ' . $data->count());
            Log::info('Room statistics: ', $stats);
            
            return view('admin.view_room', compact('data', 'stats'));
        } catch (\Exception $e) {
            Log::error('Error retrieving rooms: ' . $e->getMessage());
            $stats = [
                'total_rooms' => 0,
                'available_rooms' => 0,
                'occupied_rooms' => 0,
                'maintenance_rooms' => 0,
                'total_capacity' => 0,
                'average_price' => 0,
                'wifi_enabled' => 0,
            ];
            return view('admin.view_room', ['data' => collect(), 'stats' => $stats]);
        }
    }
    
    public function edit_room($id)
    {
        $room = Room::find($id);
        if(!$room) {
            return redirect()->back()->with('error', 'Room not found');
        }
        return view('admin.edit_room', compact('room'));
    }
    
    public function update_room(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'wifi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $room = Room::find($id);
        if(!$room) {
            return redirect()->back()->with('error', 'Room not found');
        }
        
        $room->room_title = $request->title;   
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->capacity = $request->capacity;
        $room->wifi = ($request->wifi == 'yes') ? 1 : 0;
        
        // Handle image upload
        if($request->hasFile('image'))
        {
            // Delete old image if exists
            if($room->image && file_exists(public_path('images/rooms/' . $room->image))) {
                unlink(public_path('images/rooms/' . $room->image));
            }
            
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/rooms'), $imagename);
            $room->image = $imagename;
        }
        
        $room->save();
        
        return redirect('view_room')->with('message', 'Room updated successfully');
    }
    
    public function add_room(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'wifi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Debug: Log all request data
        Log::info('Request data:', $request->all());
        
        $data = new Room();
        $data->room_title = $request->title;   
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->room_type;
        $data->capacity = $request->capacity;
        $data->wifi = ($request->wifi == 'yes') ? 1 : 0;
        
        // Handle image upload
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/rooms'), $imagename);
            $data->image = $imagename;
        }
        
        $data->save();
        
        // Debug: Log what was actually saved
        Log::info('Saved room data:', $data->toArray());
        
        return redirect()->back()->with('message', 'Room added successfully');
    }
    
    public function delete_room($id)
    {
        $data = Room::find($id);
        if($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Room deleted successfully');
        }
        return redirect()->back()->with('error', 'Room not found');
    }
}