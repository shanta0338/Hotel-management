<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'special_requests' => 'nullable|string|max:1000'
        ]);

        $room = Room::findOrFail($request->room_id);
        
        // No guests field, so skip capacity check

        // Calculate nights and total price
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);
        $totalPrice = $nights * $room->price;

        // Check for existing bookings in the same date range
        // Note: Cancelled bookings are deleted from database, so they won't interfere
        $existingBooking = Booking::where('room_id', $request->room_id)
            ->whereIn('status', ['pending', 'confirmed']) // Only check active bookings
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                          ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        if ($existingBooking) {
            return back()->withErrors(['dates' => 'Room is not available for the selected dates.'])->withInput();
        }

        // Create booking
        $booking = Booking::create([
            'room_id' => $request->room_id,
            'guest_name' => $request->guest_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'special_requests' => $request->special_requests,
            'total_price' => $totalPrice,
            'nights' => $nights,
            'status' => 'pending'
        ]);

        return redirect()->route('booking.success', $booking->id)
            ->with('success', 'Booking request submitted successfully! Our admin team will review your request.');
    }

    public function success($id)
    {
        $booking = Booking::with('room')->findOrFail($id);
        return view('booking.success', compact('booking'));
    }

    public function myBookings()
    {
        $user = Auth::user();
        $bookings = Booking::with('room')
            ->where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('booking.my-bookings', compact('bookings'));
    }

    public function cancelBooking($id)
    {
        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('email', $user->email)
            ->firstOrFail();

        // Only allow cancellation if booking is pending or confirmed
        if (in_array($booking->status, ['pending', 'confirmed'])) {
            // Store room info for success message
            $roomTitle = $booking->room->room_title;
            $checkInDate = $booking->check_in->format('M d, Y');
            $checkOutDate = $booking->check_out->format('M d, Y');
            
            // Update status to cancelled (keeps record for history but frees up the room)
            $booking->update(['status' => 'cancelled']);
            
            return redirect()->route('my.bookings')
                ->with('success', "Booking for {$roomTitle} ({$checkInDate} - {$checkOutDate}) has been cancelled. The room is now available for booking again.");
        }

        return redirect()->route('my.bookings')
            ->with('error', 'This booking cannot be cancelled.');
    }
}
