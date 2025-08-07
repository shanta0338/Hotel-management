<!DOCTYPE html>
<html>
<head>
    <title>Admin Bookings - Simple View</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .header { background: #007bff; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .booking { border: 1px solid #ddd; margin: 10px 0; padding: 15px; border-radius: 5px; background: #f9f9f9; }
        .btn { padding: 8px 16px; margin: 5px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-success { background: #28a745; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .status { padding: 5px 10px; border-radius: 3px; color: white; font-weight: bold; }
        .status-pending { background: #ffc107; color: black; }
        .status-approved { background: #28a745; }
        .status-rejected { background: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hotel Booking Management System</h1>
            <p>Manage all room bookings, approve, reject, or delete bookings</p>
        </div>
        
        @if(session('message'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 15px 0; border: 1px solid #c3e6cb;">
                ✓ {{ session('message') }}
            </div>
        @endif
        
        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 15px 0; border: 1px solid #f5c6cb;">
                ✗ {{ session('error') }}
            </div>
        @endif
        
        <div style="margin-bottom: 20px;">
            <strong>Total Bookings:</strong> {{ $bookings->count() }}
            | <strong>Pending:</strong> {{ $bookings->where('status', 'pending')->count() }}
            | <strong>Approved:</strong> {{ $bookings->where('status', 'approved')->count() }}
            | <strong>Rejected:</strong> {{ $bookings->where('status', 'rejected')->count() }}
        </div>
        
        @if($bookings && $bookings->count() > 0)
            @foreach($bookings as $booking)
            <div class="booking">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <h3>Booking #{{ $booking->id }}</h3>
                    <span class="status status-{{ $booking->status }}">{{ ucfirst($booking->status ?? 'pending') }}</span>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <p><strong>Guest Name:</strong> {{ $booking->guest_name ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $booking->email ?? 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $booking->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p><strong>Room:</strong> {{ $booking->room->room_title ?? 'Room not found' }}</p>
                        <p><strong>Check-in:</strong> {{ $booking->start_date ?? 'N/A' }}</p>
                        <p><strong>Check-out:</strong> {{ $booking->end_date ?? 'N/A' }}</p>
                    </div>
                </div>
                
                <div style="border-top: 1px solid #ddd; padding-top: 15px;">
                    @if($booking->status === 'pending')
                        <form style="display: inline;" method="POST" action="/admin/booking/approve/{{ $booking->id }}">
                            @csrf
                            <button type="submit" class="btn btn-success">✓ Approve</button>
                        </form>
                        <form style="display: inline;" method="POST" action="/admin/booking/reject/{{ $booking->id }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">✗ Reject</button>
                        </form>
                    @endif
                    
                    <form style="display: inline;" method="POST" action="/admin/booking/delete/{{ $booking->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking? This action cannot be undone.')">🗑 Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            <div style="text-align: center; padding: 40px; background: #f8f9fa; border-radius: 8px;">
                <h3>No Bookings Found</h3>
                <p>When customers make room bookings, they will appear here for you to manage.</p>
                <p>You can approve, reject, or delete bookings as needed.</p>
            </div>
        @endif
        
        <div style="margin-top: 30px; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <a href="/view_room" class="btn btn-success">← Back to Rooms Management</a>
            <a href="/admin/status" class="btn btn-warning">View System Status</a>
        </div>
    </div>
</body>
</html>
