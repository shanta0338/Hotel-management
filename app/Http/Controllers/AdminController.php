<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        return view('home.index');
    }
    public function createRoom()
    {
        return view('admin.create_room');
    }
    
    public function create_room()
    {
        return view('admin.create_room');
    }
    
    public function add_room(Request $request)
    {
        // Debug: Log all request data
        Log::info('Request data:', $request->all());
        
        $data = new Room();
        $data->room_title = $request->title;   
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        
        // Handle both 'room_type' and 'type' for compatibility
        $data->room_type = $request->room_type ?: $request->type;
        
        // Debug: Log room_type specifically
        Log::info('Room type from request:', [
            'room_type' => $request->room_type,
            'type' => $request->type,
            'final_room_type' => $data->room_type
        ]);
        
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
    public function viewRoom(){
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }
        public function deleteRoom($id){
        $data = Room::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Room deleted successfully');
        }

}
