<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        .room-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .room-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid #f1c232;
        }
        
        .room-content {
            padding: 25px;
        }
        
        .room-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        
        .room-description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .room-features {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .room-price {
            font-size: 28px;
            font-weight: bold;
            color: #f1c232;
        }
        
        .room-type {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .room-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            font-size: 14px;
        }
        
        .room-detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }
        
        .book-btn {
            background: linear-gradient(45deg, #f1c232, #ff9800);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .book-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(241, 194, 50, 0.3);
            color: white;
            text-decoration: none;
        }
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .section-subtitle {
            font-size: 20px;
            opacity: 0.9;
        }
    </style>
</head>
<body class="main-layout">
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Our Rooms</h1>
            <p class="section-subtitle">Discover comfort and luxury in every stay</p>
        </div>
    </div>
    
    <!-- Rooms Section -->
    <div class="container" style="padding: 50px 0;">
        @if($rooms && $rooms->count() > 0)
            <div class="row">
                @foreach($rooms as $room)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="room-card">
                        @if($room->image)
                            <img src="{{ asset('room_images/' . $room->image) }}" alt="{{ $room->room_title }}" class="room-image">
                        @else
                            <img src="{{ asset('images/room1.jpg') }}" alt="{{ $room->room_title }}" class="room-image">
                        @endif
                        
                        <div class="room-content">
                            <h3 class="room-title">{{ $room->room_title }}</h3>
                            
                            <div class="room-features">
                                <div class="room-price">${{ number_format($room->price, 2) }}<span style="font-size: 16px; color: #999;">/night</span></div>
                                <div class="room-type">{{ ucfirst($room->room_type) }}</div>
                            </div>
                            
                            <p class="room-description">
                                {{ $room->description ?: 'Experience comfort and luxury in this beautifully appointed room with modern amenities.' }}
                            </p>
                            
                            <div class="room-details">
                                <div class="room-detail-item">
                                    <i class="fa fa-users" style="color: #f1c232;"></i>
                                    <span>{{ $room->capacity }} {{ $room->capacity == 1 ? 'Guest' : 'Guests' }}</span>
                                </div>
                                <div class="room-detail-item">
                                    @if($room->wifi)
                                        <i class="fa fa-wifi" style="color: #28a745;"></i>
                                        <span>Free WiFi</span>
                                    @else
                                        <i class="fa fa-times" style="color: #dc3545;"></i>
                                        <span>No WiFi</span>
                                    @endif
                                </div>
                                <div class="room-detail-item">
                                    <i class="fa fa-check-circle" style="color: #28a745;"></i>
                                    <span>Available</span>
                                </div>
                            </div>
                            
                            <a href="{{ route('room_details', $room->id) }}" class="book-btn">
                                View Details & Book
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center" style="padding: 100px 0;">
                    <h3 style="color: #666; font-size: 32px; margin-bottom: 20px;">No Rooms Available</h3>
                    <p style="color: #999; font-size: 18px;">Please check back later for available rooms.</p>
                    <a href="/" style="background: #f1c232; color: white; padding: 15px 30px; text-decoration: none; border-radius: 25px; margin-top: 20px; display: inline-block;">
                        Return to Homepage
                    </a>
                </div>
            </div>
        @endif
    </div>
    
    <!-- footer -->
    @include('home.footer')
</body>
</html>
