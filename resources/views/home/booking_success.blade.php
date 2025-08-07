<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        .success-container {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 50px 0;
            text-align: center;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .success-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 30px;
        }
        
        .success-title {
            color: #28a745;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .success-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        
        .booking-details {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: left;
            border-left: 4px solid #28a745;
        }
        
        .booking-details h4 {
            color: #333;
            font-size: 24px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            font-weight: bold;
            font-size: 18px;
            color: #f1c232;
        }
        
        .detail-label {
            font-weight: 600;
            color: #333;
        }
        
        .detail-value {
            color: #666;
        }
        
        .status-badge {
            background: linear-gradient(135deg, #ffc107, #f39c12);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .action-buttons {
            margin-top: 40px;
        }
        
        .btn-primary, .btn-secondary {
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            margin: 10px;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #f1c232, #e67e22);
            color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-decoration: none;
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-decoration: none;
            color: white;
        }
        
        .info-note {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #1565c0;
            padding: 20px;
            border-radius: 15px;
            margin: 30px 0;
            border-left: 4px solid #2196f3;
        }
        
        @media (max-width: 768px) {
            .success-container {
                padding: 30px 20px;
                margin: 20px;
            }
            
            .success-title {
                font-size: 28px;
            }
            
            .booking-details {
                padding: 20px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
</head>
<body class="main-layout">
    <header>
        @include('home.header')
    </header>
    
    <div class="container" style="padding: 50px 0;">
        <div class="success-container">
            <div class="success-icon">
                <i class="fa fa-check-circle"></i>
            </div>
            
            <h1 class="success-title">Booking Request Submitted!</h1>
            
            <p class="success-message">
                Thank you for your booking request. We have received your reservation details and our admin team will review your request within 24 hours. You will receive an email confirmation once your booking is approved.
            </p>
            
            <div class="booking-details">
                <h4>Booking Details</h4>
                
                <div class="detail-row">
                    <span class="detail-label">Booking ID:</span>
                    <span class="detail-value">#{{ $booking->id }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Guest Name:</span>
                    <span class="detail-value">{{ $booking->guest_name }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $booking->email }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Phone:</span>
                    <span class="detail-value">{{ $booking->phone }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Room:</span>
                    <span class="detail-value">{{ $booking->room->room_title }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Guests:</span>
                    <span class="detail-value">{{ $booking->guests }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Check-in:</span>
                    <span class="detail-value">{{ $booking->check_in->format('M d, Y') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Check-out:</span>
                    <span class="detail-value">{{ $booking->check_out->format('M d, Y') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Nights:</span>
                    <span class="detail-value">{{ $booking->nights }}</span>
                </div>
                
                @if($booking->special_requests)
                <div class="detail-row">
                    <span class="detail-label">Special Requests:</span>
                    <span class="detail-value">{{ $booking->special_requests }}</span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="status-badge">{{ ucfirst($booking->status) }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Total Amount:</span>
                    <span class="detail-value">${{ number_format($booking->total_price, 2) }}</span>
                </div>
            </div>
            
            <div class="info-note">
                <i class="fa fa-info-circle"></i>
                <strong>Next Steps:</strong> Our admin team will review your booking request and contact you within 24 hours. Please keep your phone available for any clarifications needed.
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('room.details', $booking->room->id) }}" class="btn-primary">
                    <i class="fa fa-eye"></i> View Room Details
                </a>
                <a href="{{ route('homepage') }}" class="btn-secondary">
                    <i class="fa fa-home"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
    
    @include('home.footer')
</body>
</html>
