<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        .room-detail-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 50px 0;
        }
        
        .room-image-large {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        
        .room-info {
            padding: 40px;
        }
        
        .room-title-large {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        
        .room-price-large {
            font-size: 32px;
            font-weight: bold;
            color: #f1c232;
            margin-bottom: 30px;
        }
        
        .room-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .feature-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border-left: 4px solid #f1c232;
        }
        
        .feature-icon {
            font-size: 24px;
            color: #f1c232;
            margin-bottom: 10px;
        }
        
        .feature-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .feature-value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        
        .book-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
            margin-top: 40px;
        }
        
        .book-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-top: 30px;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .form-group input:focus {
            border-color: #f1c232;
            outline: none;
        }
        
        .book-now-btn {
            background: linear-gradient(45deg, #f1c232, #ff9800);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .book-now-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(241, 194, 50, 0.3);
        }
        
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #545b62;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body class="main-layout">
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    
    <div class="container" style="padding: 50px 0;">
        <a href="{{ route('all_rooms') }}" class="back-btn">
            <i class="fa fa-arrow-left"></i> Back to All Rooms
        </a>
        
        @if(session('error'))
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="room-detail-container">
            <div class="row">
                <div class="col-lg-6">
                    @if($room->image)
                        <img src="{{ asset('room_images/' . $room->image) }}" alt="{{ $room->room_title }}" class="room-image-large">
                    @else
                        <img src="{{ asset('images/room1.jpg') }}" alt="{{ $room->room_title }}" class="room-image-large">
                    @endif
                </div>
                
                <div class="col-lg-6">
                    <div class="room-info">
                        <h1 class="room-title-large">{{ $room->room_title }}</h1>
                        
                        <div class="room-price-large">
                            ${{ number_format($room->price, 2) }}
                            <span style="font-size: 18px; color: #666;">/night</span>
                        </div>
                        
                        <div style="background: #28a745; color: white; padding: 10px 20px; border-radius: 20px; display: inline-block; margin-bottom: 30px;">
                            <i class="fa fa-tag"></i> {{ ucfirst($room->room_type) }} Room
                        </div>
                        
                        <p style="font-size: 18px; line-height: 1.6; color: #666; margin-bottom: 30px;">
                            {{ $room->description ?: 'Experience ultimate comfort and luxury in this beautifully appointed room. Our rooms are designed with modern amenities and elegant furnishings to ensure your stay is memorable and relaxing.' }}
                        </p>
                        
                        <div class="room-features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="feature-label">Capacity</div>
                                <div class="feature-value">{{ $room->capacity }} {{ $room->capacity == 1 ? 'Guest' : 'Guests' }}</div>
                            </div>
                            
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-wifi"></i>
                                </div>
                                <div class="feature-label">WiFi</div>
                                <div class="feature-value">
                                    @if($room->wifi)
                                        <span style="color: #28a745;">Free WiFi</span>
                                    @else
                                        <span style="color: #dc3545;">Not Available</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-label">Status</div>
                                <div class="feature-value" style="color: #28a745;">Available</div>
                            </div>
                            
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="feature-label">Room Type</div>
                                <div class="feature-value">{{ ucfirst($room->room_type) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Booking Section -->
            <div class="book-section">
                <h2 style="font-size: 32px; margin-bottom: 20px;">Ready to Book?</h2>
                <p style="font-size: 18px; opacity: 0.9;">Reserve this room and enjoy a comfortable stay with us</p>
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="book-form">
                            <h3 style="margin-bottom: 30px; color: #333;">Booking Information</h3>
                            
                            <form action="{{ route('book_room', $room->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Check-in Date</label>
                                            <input type="date" name="checkin" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Check-out Date</label>
                                            <input type="date" name="checkout" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Guest Name</label>
                                    <input type="text" name="guest_name" placeholder="Enter your full name" required value="{{ old('guest_name') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" placeholder="Enter your phone number" required value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label>Special Requests (Optional)</label>
                                    <textarea name="special_requests" placeholder="Any special requests or notes" style="height: 80px; width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px;">{{ old('special_requests') }}</textarea>
                                </div>
                                
                                <button type="submit" class="book-now-btn">
                                    <i class="fa fa-calendar-check"></i> Book This Room Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    @include('home.footer')
</body>
</html>
