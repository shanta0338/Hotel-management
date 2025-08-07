<!DOCTYPE html>
<html>
<head>
    <title>Admin Bookings</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .booking { border: 1px solid #ddd; margin: 10px 0; padding: 15px; border-radius: 5px; }
        .btn { padding: 8px 16px; margin: 5px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-success { background: #28a745; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .status-pending { background: #ffc107; }
        .status-approved { background: #28a745; color: white; }
        .status-rejected { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h1>Hotel Bookings Management</h1>
    
    @if(session('message'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px 0;">
            {{ session('message') }}
        </div>
    @endif
    
    @if($bookings && $bookings->count() > 0)
        @foreach($bookings as $booking)
        <div class="booking">
            <h3>Booking #{{ $booking->id }} - <span class="status-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></h3>
            <p><strong>Guest:</strong> {{ $booking->guest_name }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Phone:</strong> {{ $booking->phone }}</p>
            <p><strong>Room:</strong> {{ $booking->room->room_title ?? 'Unknown Room' }}</p>
            <p><strong>Check-in:</strong> {{ $booking->check_in->format('M d, Y') }}</p>
            <p><strong>Check-out:</strong> {{ $booking->check_out->format('M d, Y') }}</p>
            <p><strong>Nights:</strong> {{ $booking->nights }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
            @if($booking->special_requests)
                <p><strong>Special Requests:</strong> {{ $booking->special_requests }}</p>
            @endif
            
            <div>
                @if($booking->status === 'pending')
                    <form style="display: inline;" method="POST" action="/admin/booking/approve/{{ $booking->id }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form style="display: inline;" method="POST" action="/admin/booking/reject/{{ $booking->id }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                @endif
                <form style="display: inline;" method="POST" action="/admin/booking/delete/{{ $booking->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this booking?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    @else
        <p>No bookings found. When users make bookings, they will appear here for you to approve or reject.</p>
    @endif
    
    <p><a href="/view_room">← Back to Rooms</a></p>
</body>
</html>
