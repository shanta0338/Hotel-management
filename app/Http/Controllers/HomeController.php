<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Get available rooms for public display (limit to 6 rooms for homepage)
            $rooms = Room::orderBy('created_at', 'desc')
                ->limit(6)
                ->get();

            Log::info('Homepage loaded successfully. Featured rooms count: ' . $rooms->count());
        } catch (\Exception $e) {
            Log::error('Error loading Homepage: ' . $e->getMessage());
            $rooms = collect([]);
        }

        $user = Auth::user();
        return view('home.index', compact('rooms', 'user'));
    }

    public function aboutUs()
    {
        try {
            // Get featured rooms for About Us page (limited for performance)
            $rooms = Room::orderBy('created_at', 'desc')
                ->limit(3) // Only show 3 featured rooms
                ->get();

            Log::info('About Us page loaded successfully. Featured rooms count: ' . $rooms->count());
        } catch (\Exception $e) {
            Log::error('Error loading About Us page: ' . $e->getMessage());
            $rooms = collect([]);
        }

        $user = Auth::user();
        return view('home.about_us', compact('rooms', 'user'));
    }

    public function ourRooms()
    {
        try {
            // Optimized query - limit results to prevent performance issues
            $rooms = Room::orderBy('created_at', 'desc')
                ->limit(50) // Limit to 50 rooms for better performance
                ->get();

            // Log for debugging
            Log::info('Our Rooms page loaded successfully. Rooms count: ' . $rooms->count());
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error loading Our Rooms page: ' . $e->getMessage());

            // Return empty collection if there's an error
            $rooms = collect([]);
        }

        $user = Auth::user();
        return view('home.our_rooms', compact('rooms', 'user'));
    }

    public function gallery()
    {
        try {
            // Get rooms with images for gallery (limited for performance)
            $rooms = Room::whereNotNull('image')
                ->orderBy('created_at', 'desc')
                ->limit(12) // Limit to 12 rooms for better performance
                ->get();

            Log::info('Gallery page loaded successfully. Rooms with images count: ' . $rooms->count());
        } catch (\Exception $e) {
            Log::error('Error loading Gallery page: ' . $e->getMessage());
            $rooms = collect([]);
        }

        $user = Auth::user();
        return view('home.gallery', compact('rooms', 'user'));
    }

    public function contactUs()
    {
        try {
            Log::info('Contact Us page loaded successfully');
        } catch (\Exception $e) {
            Log::error('Error loading Contact Us page: ' . $e->getMessage());
        }

        $user = Auth::user();
        return view('home.contact_us', compact('user'));
    }

    public function submitContact(Request $request)
    {
        try {
            // Validate the form data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:5000',
            ]);

            // Create the contact record
            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'user_id' => Auth::id(), // Will be null if user is not logged in
                'status' => 'new'
            ]);

            Log::info('Contact form submitted successfully', [
                'contact_id' => $contact->id,
                'user_id' => Auth::id(),
                'subject' => $validated['subject']
            ]);

            // Send email notification (optional - you can implement this later)
            try {
                // You can add email sending logic here
                // Mail::to('admin@hotel.com')->send(new ContactFormMail($contact));
            } catch (\Exception $e) {
                Log::warning('Failed to send email notification for contact form', [
                    'contact_id' => $contact->id,
                    'error' => $e->getMessage()
                ]);
            }

            return redirect()->route('contact_us')->with(
                'success',
                'Thank you for contacting us! Your message has been received and we will respond within 24 hours.'
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Contact form validation failed', [
                'errors' => $e->errors(),
                'user_id' => Auth::id()
            ]);

            return redirect()->route('contact_us')
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form and try again.');
        } catch (\Exception $e) {
            Log::error('Error submitting contact form', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);

            return redirect()->route('contact_us')
                ->withInput()
                ->with('error', 'Sorry, there was an error processing your message. Please try again later.');
        }
    }

    public function blog()
    {
        try {
            // Get featured rooms for blog page (limited for performance)
            $rooms = Room::orderBy('created_at', 'desc')
                ->limit(6) // Only show 6 featured rooms
                ->get();

            Log::info('Blog page loaded successfully. Featured rooms count: ' . $rooms->count());
        } catch (\Exception $e) {
            Log::error('Error loading Blog page: ' . $e->getMessage());
            $rooms = collect([]);
        }

        $user = Auth::user();
        return view('home.blog', compact('rooms', 'user'));
    }

    public function roomDetails($id)
    {
        try {
            $room = Room::with(['bookings' => function ($q) {
                $q->orderBy('check_in');
            }])->findOrFail($id);

            // Ensure all required fields have default values
            if (!$room->description) {
                $room->description = 'Experience ultimate comfort and luxury in this beautifully appointed room.';
            }
            if (!$room->room_type) {
                $room->room_type = 'standard';
            }
            if (!$room->capacity) {
                $room->capacity = 2;
            }

            $bookings = $room->bookings;
            return view('home.room_details', compact('room', 'bookings'));
        } catch (\Exception $e) {
            return redirect()->route('our_rooms')->with('error', 'Room not found or unavailable.');
        }
    }

    public function bookingForm($id)
    {
        try {
            $room = Room::findOrFail($id);

            // Ensure all required fields have default values
            if (!$room->description) {
                $room->description = 'Experience ultimate comfort and luxury in this beautifully appointed room.';
            }
            if (!$room->room_type) {
                $room->room_type = 'standard';
            }
            if (!$room->capacity) {
                $room->capacity = 2;
            }

            return view('home.booking_form', compact('room'));
        } catch (\Exception $e) {
            return redirect()->route('our_rooms')->with('error', 'Room not found or unavailable.');
        }
    }
}
