<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        .back_re {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0;
            text-align: center;
        }
        
        .title h2 {
            color: white;
            font-size: 48px;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .room-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .booking-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .booking-container h3 {
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 16px;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
        }
        
        .btn-book {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            background: #6c757d;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        
        .back-btn i {
            margin-right: 8px;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
        }
        
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .price-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        
        .price-summary h4 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .price-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .total-price {
            font-weight: bold;
            font-size: 18px;
            color: #667eea;
            border-top: 2px solid #dee2e6;
            padding-top: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#"/></div>
    </div>
    
    <header>
        @include('home.header')
    </header>

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Book Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Room Information -->
                <div class="room-card">
                    <div class="row">
                        <div class="col-md-4">
                            @if($room->image)
                                <img src="{{ asset('images/rooms/' . $room->image) }}" alt="{{ $room->room_title }}" class="img-fluid" style="border-radius: 8px; width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/room1.jpg') }}" alt="{{ $room->room_title }}" class="img-fluid" style="border-radius: 8px; width: 100%; height: 200px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $room->room_title }}</h3>
                            <p><strong>Price:</strong> ${{ number_format($room->price, 2) }} per night</p>
                            <p><strong>Type:</strong> {{ ucfirst($room->room_type) }}</p>
                            <p><strong>Capacity:</strong> {{ $room->capacity }} {{ $room->capacity == 1 ? 'guest' : 'guests' }}</p>
                            <p><strong>WiFi:</strong> {{ $room->wifi ? 'Available' : 'Not Available' }}</p>
                            @if($room->description)
                            <p>{{ Str::limit($room->description, 150) }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="booking-container">
                    <h3>Booking Details</h3>
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guest_name">Full Name *</label>
                                    <input type="text" class="form-control" id="guest_name" name="guest_name" value="{{ old('guest_name') }}" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guests">Number of Guests *</label>
                                    <select class="form-control" id="guests" name="guests" required>
                                        @for($i = 1; $i <= ($room->capacity ?? 4); $i++)
                                            <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'Guest' : 'Guests' }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_in">Check-in Date *</label>
                                    <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in') }}" min="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_out">Check-out Date *</label>
                                    <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="special_requests">Special Requests (Optional)</label>
                            <textarea class="form-control" id="special_requests" name="special_requests" rows="4" placeholder="Any special requests or requirements...">{{ old('special_requests') }}</textarea>
                        </div>

                        <!-- Price Summary -->
                        <div class="price-summary">
                            <h4>Booking Summary</h4>
                            <div class="price-line">
                                <span>Room Rate:</span>
                                <span>${{ number_format($room->price, 2) }} / night</span>
                            </div>
                            <div class="price-line">
                                <span>Total Nights:</span>
                                <span id="total-nights">0</span>
                            </div>
                            <div class="price-line total-price">
                                <span>Total Amount:</span>
                                <span>$<span id="total-amount">0.00</span></span>
                            </div>
                        </div>

                        <button type="submit" class="btn-book">Book Now</button>
                        
                        <p style="text-align: center; margin-top: 15px; color: #666; font-style: italic;">
                            <i class="fa fa-info-circle"></i> Your booking will be reviewed within 24 hours
                        </p>
                    </form>
                </div>
                
                <div style="text-align: center; margin: 30px 0;">
                    <a href="{{ route('our_rooms') }}" class="back-btn">
                        <i class="fa fa-arrow-left"></i> Back to Rooms
                    </a>
                </div>
            </div>
        </div>
    </div>

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
            
            // Auto-update checkout date when checkin date changes
            checkInInput.addEventListener('change', function() {
                const checkinDate = new Date(this.value);
                const checkoutDate = new Date(checkinDate);
                checkoutDate.setDate(checkoutDate.getDate() + 1);
                
                checkOutInput.min = checkoutDate.toISOString().split('T')[0];
                
                if (!checkOutInput.value || new Date(checkOutInput.value) <= checkinDate) {
                    checkOutInput.value = checkoutDate.toISOString().split('T')[0];
                }
                
                calculateTotal();
            });
            
            checkOutInput.addEventListener('change', calculateTotal);
            
            // Calculate on page load if dates are set
            calculateTotal();
        });
    </script>
</body>
</html>
