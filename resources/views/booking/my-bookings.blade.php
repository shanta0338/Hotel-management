<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Bookings - Hotel Management</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
    <style>
        .booking-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .booking-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
        }
        
        .booking-body {
            padding: 25px;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .status-confirmed {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .status-rejected {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .btn-cancel {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: linear-gradient(135deg, #c82333, #bd2130);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .info-item i {
            width: 20px;
            margin-right: 10px;
            color: #667eea;
        }
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0 50px 0;
            text-align: center;
        }
        
        .no-bookings {
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="main-layout">
    <!-- Header -->
    <header>
        @include('home.header')
    </header>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 style="font-size: 3rem; margin-bottom: 15px;">My Bookings</h1>
            <p style="font-size: 1.2rem; opacity: 0.9;">Manage your hotel reservations</p>
        </div>
    </div>

    <!-- Main Content -->
    <div style="padding: 60px 0; background: #f8f9fa;">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($bookings->count() > 0)
                <div class="row">
                    @foreach($bookings as $booking)
                        <div class="col-md-6 col-lg-4">
                            <div class="booking-card">
                                <div class="booking-header">
                                    <h5 style="margin: 0;">{{ $booking->room->room_title }}</h5>
                                    <small>Booking #{{ $booking->id }}</small>
                                </div>
                                <div class="booking-body">
                                    <div class="info-item">
                                        <i class="fa fa-user"></i>
                                        <span>{{ $booking->guest_name }}</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fa fa-calendar"></i>
                                        <span>{{ date('M d, Y', strtotime($booking->check_in)) }} - {{ date('M d, Y', strtotime($booking->check_out)) }}</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fa fa-moon-o"></i>
                                        <span>{{ $booking->nights }} night{{ $booking->nights > 1 ? 's' : '' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fa fa-dollar"></i>
                                        <span>${{ number_format($booking->total_price, 2) }}</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fa fa-info-circle"></i>
                                        <span class="status-badge status-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span>
                                    </div>
                                    
                                    @if($booking->special_requests)
                                    <div class="info-item">
                                        <i class="fa fa-comment"></i>
                                        <span>{{ Str::limit($booking->special_requests, 50) }}</span>
                                    </div>
                                    @endif
                                    
                                    <div style="margin-top: 20px; text-align: center;">
                                        @if(in_array($booking->status, ['pending', 'confirmed']))
                                            <form method="POST" action="{{ route('booking.cancel', $booking->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn-cancel">
                                                    <i class="fa fa-times"></i> Cancel Booking
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">
                                                @if($booking->status === 'cancelled')
                                                    <i class="fa fa-ban"></i> Booking Cancelled
                                                    <br><small style="color: #28a745; font-weight: bold;"><i class="fa fa-check"></i> Room is now available for booking</small>
                                                @elseif($booking->status === 'rejected')
                                                    <i class="fa fa-times-circle"></i> Booking Rejected
                                                @elseif($booking->status === 'completed')
                                                    <i class="fa fa-check-circle"></i> Booking Completed
                                                @endif
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="no-bookings">
                            <i class="fa fa-calendar-o" style="font-size: 4rem; color: #ccc; margin-bottom: 20px;"></i>
                            <h3 style="color: #666; margin-bottom: 15px;">No Bookings Found</h3>
                            <p style="color: #999; margin-bottom: 30px;">You haven't made any bookings yet. Browse our rooms to make your first reservation!</p>
                            <a href="{{ route('our_rooms') }}" class="btn" style="background: #fe0000; color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">
                                <i class="fa fa-bed"></i> Browse Rooms
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    @include('home.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        });
    </script>
</body>
</html>
