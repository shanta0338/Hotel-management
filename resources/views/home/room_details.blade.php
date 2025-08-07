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
        
        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px 0 0 20px;
            background: #f8f9fa;
        }
        
        .room-image-large {
            width: 100%;
            height: 450px;
            object-fit: cover;
            object-position: center;
            border-radius: 20px 0 0 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
            filter: contrast(1.1) brightness(1.05) saturate(1.1);
        }
        
        .room-image-large:hover {
            transform: scale(1.02);
            filter: contrast(1.15) brightness(1.1) saturate(1.15);
        }
        
        .room-info {
            padding: 40px;
        }
        
        .room-title-large {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .room-price-large {
            font-size: 32px;
            font-weight: bold;
            color: #f1c232;
            margin-bottom: 30px;
        }
        
        .room-type-badge {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .room-description {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 40px;
        }
        
        .room-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin: 40px 0;
            padding: 30px 0;
        }
        
        .feature-item {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 30px 25px;
            border-radius: 15px;
            text-align: center;
            border-left: 4px solid #f1c232;
            transition: all 0.3s ease;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        
        .feature-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-left-color: #e67e22;
        }
        
        .feature-icon {
            font-size: 36px;
            color: #f1c232;
            margin-bottom: 20px;
            display: block;
        }
        
        .feature-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .feature-value {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            line-height: 1.3;
        }
        
        .contact-section {
            background: linear-gradient(135deg, #f1c232, #e67e22);
            color: white;
            padding: 60px 40px;
            text-align: center;
            margin-top: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .contact-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .contact-section > p {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .contact-item {
            padding: 20px;
        }
        
        .contact-item i {
            font-size: 32px;
            margin-bottom: 20px;
            display: block;
        }
        
        .contact-item h4 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .contact-item p {
            font-size: 18px;
            margin: 0;
            opacity: 0.95;
        }
        
        .contact-btn {
            background: white;
            color: #f1c232;
            padding: 18px 40px;
            border-radius: 35px;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            display: inline-block;
            margin-top: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        .contact-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            text-decoration: none;
            color: #e67e22;
            background: #fff;
        }
        
        .back-btn {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .back-btn:hover {
            background: linear-gradient(135deg, #545b62, #343a40);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-decoration: none;
            color: white;
        }
        
        .back-btn i {
            margin-right: 10px;
        }
        
        .alert {
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: none;
            font-size: 16px;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-left: 5px solid #dc3545;
        }
        
        /* Booking Section Styles */
        .booking-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 50px 40px;
            border-radius: 20px;
            margin-top: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        
        .booking-section h2 {
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .booking-section > p {
            color: #666;
            font-size: 18px;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .booking-form {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            font-size: 16px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            border-color: #f1c232;
            box-shadow: 0 0 0 0.2rem rgba(241, 194, 50, 0.25);
            outline: none;
        }
        
        .booking-summary {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin: 30px 0;
            border-left: 4px solid #f1c232;
        }
        
        .price-calculation p {
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }
        
        .total-price {
            font-size: 20px !important;
            color: #f1c232 !important;
            padding-top: 15px;
            border-top: 2px solid #f1c232;
            margin-top: 15px !important;
        }
        
        .booking-btn {
            background: linear-gradient(135deg, #f1c232, #e67e22);
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .booking-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
            background: linear-gradient(135deg, #e67e22, #d35400);
        }
        
        .booking-btn i {
            margin-right: 10px;
        }
        
        .booking-note {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        
        .booking-note i {
            color: #f1c232;
            margin-right: 5px;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .room-image-large {
                height: 300px;
                border-radius: 20px 20px 0 0;
            }
            
            .image-container {
                border-radius: 20px 20px 0 0;
            }
            
            .room-title-large {
                font-size: 28px;
            }
            
            .room-price-large {
                font-size: 24px;
            }
            
            .room-info {
                padding: 30px 20px;
            }
            
            .room-features-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 20px 0;
            }
            
            .feature-item {
                padding: 25px 20px;
            }
            
            .contact-section {
                padding: 40px 30px;
            }
            
            .contact-section h2 {
                font-size: 28px;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .back-btn {
                padding: 12px 25px;
                font-size: 16px;
            }
        }
        
        @media (max-width: 576px) {
            .room-detail-container {
                margin: 20px 0;
                border-radius: 15px;
            }
            
            .room-title-large {
                font-size: 24px;
            }
            
            .room-price-large {
                font-size: 20px;
            }
            
            .contact-section {
                padding: 30px 20px;
                border-radius: 15px;
            }
            
            .contact-section h2 {
                font-size: 24px;
            }
            
            .contact-btn {
                padding: 15px 30px;
                font-size: 18px;
            }
        }
    </style>
    </style>
</head>
<body class="main-layout">
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    
    <div class="container" style="padding: 50px 0;">
        <a href="{{ route('homepage') }}" class="back-btn">
            <i class="fa fa-home"></i> Home
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
                    <div class="image-container">
                        @if($room->image)
                            <img src="{{ asset('images/rooms/' . $room->image) }}" alt="{{ $room->room_title }}" class="room-image-large">
                        @else
                            <img src="{{ asset('images/room1.jpg') }}" alt="{{ $room->room_title }}" class="room-image-large">
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="room-info">
                        <h1 class="room-title-large">{{ $room->room_title ?? 'Room Title' }}</h1>
                        
                        <div class="room-price-large">
                            ${{ number_format($room->price ?? 0, 2) }}
                            <span style="font-size: 18px; color: #666;">/night</span>
                        </div>
                        
                        <div style="background: #28a745; color: white; padding: 10px 20px; border-radius: 20px; display: inline-block; margin-bottom: 30px;">
                            <i class="fa fa-tag"></i> {{ ucfirst($room->room_type ?? 'standard') }} Room
                        </div>
                        
                        <p class="room-description">
                            {{ $room->description ?? 'Experience ultimate comfort and luxury in this beautifully appointed room. Our rooms are designed with modern amenities and elegant furnishings to ensure your stay is memorable and relaxing.' }}
                        </p>

                        <!-- Existing Bookings Section -->
                        <div class="existing-bookings" style="margin-bottom: 30px;">
                            <h4 style="color: #0ea5e9; margin-bottom: 10px;">Unavailable Dates for This Room</h4>
                            @if(isset($bookings) && $bookings->count())
                                <ul style="list-style: none; padding-left: 0;">
                                    @foreach($bookings as $booking)
                                        <li style="margin-bottom: 6px; color: #dc3545;">
                                            <i class="fa fa-calendar-times-o"></i>
                                            {{ $booking->check_in->format('M d, Y') }} to {{ $booking->check_out->format('M d, Y') }}
                                            <span style="color: #888; font-size: 13px;">({{ ucfirst($booking->status) }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span style="color: #28a745;">No current bookings. All dates available!</span>
                            @endif
                        </div>
                        
                        <div class="room-features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="feature-label">Capacity</div>
                                <div class="feature-value">{{ $room->capacity ?? 2 }} {{ ($room->capacity ?? 2) == 1 ? 'Guest' : 'Guests' }}</div>
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
                                <div class="feature-value">{{ ucfirst($room->room_type ?? 'standard') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Booking Section -->
            <div class="booking-section">
                <h2>Book This Room</h2>
                <p>Select your preferred dates and we'll process your booking request</p>
                
                <form action="{{ route('booking.store') }}" method="POST" class="booking-form">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="check_in">Check-in Date</label>
                                <input type="date" class="form-control" id="check_in" name="check_in" required min="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="check_out">Check-out Date</label>
                                <input type="date" class="form-control" id="check_out" name="check_out" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="special_requests">Special Requests (Optional)</label>
                        <textarea class="form-control" id="special_requests" name="special_requests" rows="3" placeholder="Any special requirements or requests..."></textarea>
                    </div>
                    
                    <div class="booking-summary">
                        <div class="price-calculation">
                            <p><strong>Room Rate:</strong> ${{ number_format($room->price ?? 0, 2) }} / night</p>
                            <p><strong>Total Nights:</strong> <span id="total-nights">0</span></p>
                            <p class="total-price"><strong>Total Amount:</strong> $<span id="total-amount">0.00</span></p>
                        </div>
                    </div>
                    
                    <button type="submit" class="booking-btn">
                        <i class="fa fa-calendar-check"></i> Submit Booking Request
                    </button>
                    
                    <p class="booking-note">
                        <i class="fa fa-info-circle"></i> Your booking request will be reviewed by our admin team within 24 hours.
                    </p>
                </form>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    @include('home.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');
            const totalNightsSpan = document.getElementById('total-nights');
            const totalAmountSpan = document.getElementById('total-amount');
            const roomPrice = {{ $room->price ?? 0 }};
            
            function calculateTotal() {
                const checkInDate = new Date(checkInInput.value);
                const checkOutDate = new Date(checkOutInput.value);
                
                if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
                    const timeDiff = checkOutDate.getTime() - checkInDate.getTime();
                    const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    const totalAmount = nights * roomPrice;
                    
                    totalNightsSpan.textContent = nights;
                    totalAmountSpan.textContent = totalAmount.toFixed(2);
                } else {
                    totalNightsSpan.textContent = '0';
                    totalAmountSpan.textContent = '0.00';
                }
            }
            
            // Update check-out minimum date when check-in changes
            checkInInput.addEventListener('change', function() {
                const checkInDate = new Date(this.value);
                const nextDay = new Date(checkInDate);
                nextDay.setDate(checkInDate.getDate() + 1);
                
                checkOutInput.min = nextDay.toISOString().split('T')[0];
                
                // Clear check-out if it's before new minimum
                if (checkOutInput.value && new Date(checkOutInput.value) <= checkInDate) {
                    checkOutInput.value = '';
                }
                
                calculateTotal();
            });
            
            checkOutInput.addEventListener('change', calculateTotal);
        });
    </script>
</body>
</html>
