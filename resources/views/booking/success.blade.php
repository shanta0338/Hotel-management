
<x-app-layout>
    <div class="container" style="max-width: 600px; margin: 40px auto; background: #f8fafc; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 30px;">
        <h2 style="color: #38bdf8; text-align: center; margin-bottom: 25px;">Booking Successful!</h2>
        <div style="background: #e0f7fa; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
            <h4 style="color: #0ea5e9;">Thank you, {{ $booking->guest_name }}!</h4>
            <p>Your booking has been confirmed. Here are your booking details:</p>
        </div>
        <table style="width: 100%; margin-bottom: 20px;">
            <tr><td><strong>Room:</strong></td><td>{{ $booking->room->room_title ?? '-' }}</td></tr>
            <tr><td><strong>Check-in:</strong></td><td>{{ $booking->check_in->format('F j, Y') }}</td></tr>
            <tr><td><strong>Check-out:</strong></td><td>{{ $booking->check_out->format('F j, Y') }}</td></tr>
            <tr><td><strong>Nights:</strong></td><td>{{ $booking->nights }}</td></tr>
            <tr><td><strong>Guests:</strong></td><td>1</td></tr>
            <tr><td><strong>Email:</strong></td><td>{{ $booking->email }}</td></tr>
            <tr><td><strong>Phone:</strong></td><td>{{ $booking->phone }}</td></tr>
            <tr><td><strong>Special Requests:</strong></td><td>{{ $booking->special_requests ?: '-' }}</td></tr>
            <tr><td><strong>Total Price:</strong></td><td>${{ number_format($booking->total_price, 2) }}</td></tr>
            <tr><td><strong>Status:</strong></td><td>{{ ucfirst($booking->status) }}</td></tr>
        </table>
        <div style="text-align: center;">
            <a href="{{ url('/') }}" style="background: #38bdf8; color: white; padding: 10px 25px; border-radius: 5px; text-decoration: none;">Back to Home</a>
        </div>
    </div>
</x-app-layout>
