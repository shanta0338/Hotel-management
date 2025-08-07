<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Contact Us - Hotel Management</title>
      <meta name="keywords" content="hotel contact, booking inquiries, customer service">
      <meta name="description" content="Get in touch with our luxury hotel for bookings, inquiries, and customer support. 24/7 service available.">
      <meta name="author" content="Hotel Management">
      
      <!-- Open Graph Meta Tags -->
      <meta property="og:title" content="Contact Us - Hotel Management">
      <meta property="og:description" content="Get in touch with our luxury hotel for bookings and inquiries">
      <meta property="og:type" content="website">
      
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      
      <!-- Custom Contact Page Styles -->
      <style>
         :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #fe0000;
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f8f9fa;
            --shadow: 0 5px 20px rgba(0,0,0,0.1);
            --border-radius: 15px;
         }
         
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
         }
         
         .contact-banner {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 120px 0 60px 0;
            position: relative;
            overflow: hidden;
         }
         
         .contact-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grain" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="20" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
         }
         
         .contact-banner h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
         }
         
         .contact-banner p {
            font-size: 1.3rem;
            color: #e0e6ff;
            margin-bottom: 0;
         }
         
         .contact-section {
            padding: 80px 0;
            background: var(--bg-light);
            min-height: 60vh;
         }
         
         .user-welcome {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 30px;
            border-radius: var(--border-radius);
            text-align: center;
            margin-bottom: 40px;
            box-shadow: var(--shadow);
         }
         
         .alert-custom {
            padding: 25px;
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
         }
         
         .alert-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
         }
         
         .alert-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
            color: white;
         }
         
         .alert-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
            color: white;
         }
         
         .contact-card {
            background: white;
            padding: 50px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            height: 100%;
            transition: transform 0.3s ease;
         }
         
         .contact-card:hover {
            transform: translateY(-5px);
         }
         
         .form-group {
            margin-bottom: 25px;
         }
         
         .form-label {
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            font-size: 0.95rem;
         }
         
         .form-control {
            padding: 18px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
         }
         
         .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
         }
         
         .form-control.is-invalid {
            border-color: #dc3545;
         }
         
         .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 8px;
         }
         
         .btn-primary {
            background: linear-gradient(135deg, var(--accent-color) 0%, #ff4757 100%);
            border: none;
            padding: 18px 45px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(254, 0, 0, 0.3);
         }
         
         .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(254, 0, 0, 0.4);
         }
         
         .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
         }
         
         .contact-info-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
         }
         
         .contact-icon {
            background: linear-gradient(135deg, var(--accent-color) 0%, #ff4757 100%);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 25px;
            font-size: 1.4rem;
            box-shadow: 0 4px 15px rgba(254, 0, 0, 0.3);
         }
         
         .contact-info-content h5 {
            color: var(--text-dark);
            margin-bottom: 8px;
            font-weight: 600;
         }
         
         .contact-info-content p {
            color: var(--text-light);
            margin: 0;
            line-height: 1.5;
         }
         
         .map-section {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            margin-top: 50px;
         }
         
         .map-placeholder {
            height: 350px;
            background: linear-gradient(135deg, #f1f3f4 0%, #e8eaed 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: var(--text-light);
         }
         
         .loading-animation {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
         }
         
         @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
         }
         
         @media (max-width: 768px) {
            .contact-banner {
               padding: 80px 0 40px 0;
            }
            
            .contact-banner h1 {
               font-size: 2.5rem;
            }
            
            .contact-banner p {
               font-size: 1.1rem;
            }
            
            .contact-card {
               padding: 30px;
               margin-bottom: 30px;
            }
            
            .contact-section {
               padding: 50px 0;
            }
         }
         
         /* Performance optimizations */
         .lazy-load {
            opacity: 0;
            transition: opacity 0.3s;
         }
         
         .lazy-load.loaded {
            opacity: 1;
         }
      </style>
   </head>
   
   <body class="main-layout">
      <!-- Optimized Loader -->
      <div class="loader_bg" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.9); z-index: 9999; display: flex; align-items: center; justify-content: center;">
         <div class="loading-animation"></div>
      </div>
      
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      
      <!-- Contact Banner -->
      <div class="contact-banner">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  @if($user)
                     <h1>Hello {{ $user->name }}!</h1>
                     <p>We're here to assist you with your hotel needs</p>
                  @else
                     <h1>Contact Us</h1>
                     <p>Get in touch with our friendly team</p>
                  @endif
               </div>
            </div>
         </div>
      </div>

      <!-- Contact Content -->
      <div class="contact-section">
         <div class="container">
            @if($user)
            <div class="user-welcome">
               <h4 style="color: white; margin-bottom: 10px;">Welcome {{ $user->name }}!</h4>
               <p style="color: #e0e6ff; margin: 0; font-size: 1.1rem;">As a valued member, you can reach out to us for any assistance or booking inquiries.</p>
            </div>
            @endif
            
            <!-- Success and Error Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-custom">
               <h5 style="margin-bottom: 10px;"><i class="fas fa-check-circle"></i> Success!</h5>
               <p style="margin: 0; font-size: 1.1rem;">{{ session('success') }}</p>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-custom">
               <h5 style="margin-bottom: 10px;"><i class="fas fa-exclamation-triangle"></i> Error!</h5>
               <p style="margin: 0; font-size: 1.1rem;">{{ session('error') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-warning alert-custom">
               <h5 style="margin-bottom: 15px;"><i class="fas fa-exclamation-circle"></i> Please fix the following errors:</h5>
               <ul style="margin: 0; padding-left: 20px;">
                  @foreach($errors->all() as $error)
                  <li style="margin-bottom: 5px;">{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            
            <div class="row">
               <!-- Contact Form -->
               <div class="col-lg-6 col-md-12">
                  <div class="contact-card">
                     <h3 style="text-align: center; margin-bottom: 40px; color: var(--text-dark);">Send us a Message</h3>
                     
                     <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                        @csrf
                        
                        <div class="form-group">
                           <label class="form-label">Full Name *</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                  value="{{ old('name', $user ? $user->name : '') }}" 
                                  placeholder="{{ $user ? $user->name : 'Enter your full name' }}" 
                                  required aria-describedby="nameHelp">
                           @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        
                        <div class="form-group">
                           <label class="form-label">Email Address *</label>
                           <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                  value="{{ old('email', $user ? $user->email : '') }}" 
                                  placeholder="{{ $user ? $user->email : 'Enter your email address' }}" 
                                  required aria-describedby="emailHelp">
                           @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        
                        <div class="form-group">
                           <label class="form-label">Phone Number</label>
                           <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                  value="{{ old('phone') }}" 
                                  placeholder="Enter your phone number">
                           @error('phone')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        
                        <div class="form-group">
                           <label class="form-label">Subject *</label>
                           <select name="subject" class="form-control @error('subject') is-invalid @enderror" required>
                              <option value="">Select a subject</option>
                              <option value="booking" {{ old('subject') == 'booking' ? 'selected' : '' }}>Room Booking Inquiry</option>
                              <option value="reservation" {{ old('subject') == 'reservation' ? 'selected' : '' }}>Reservation Management</option>
                              <option value="services" {{ old('subject') == 'services' ? 'selected' : '' }}>Hotel Services</option>
                              <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint or Issue</option>
                              <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                              <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                           </select>
                           @error('subject')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        
                        <div class="form-group">
                           <label class="form-label">Message *</label>
                           <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" 
                                     placeholder="Tell us how we can help you..." 
                                     required>{{ old('message') }}</textarea>
                           @error('message')
                              <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                        
                        <div class="text-center">
                           <button type="submit" class="btn btn-primary" id="submitBtn">
                              <i class="fas fa-paper-plane"></i> Send Message
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
               
               <!-- Contact Information -->
               <div class="col-lg-6 col-md-12">
                  <div class="contact-card">
                     <h3 style="text-align: center; margin-bottom: 40px; color: var(--text-dark);">Get in Touch</h3>
                     
                     <div class="contact-info-item">
                        <div class="contact-icon">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info-content">
                           <h5>Address</h5>
                           <p>123 Luxury Street, Hotel District<br>City Center, State 12345</p>
                        </div>
                     </div>
                     
                     <div class="contact-info-item">
                        <div class="contact-icon">
                           <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-info-content">
                           <h5>Phone</h5>
                           <p><a href="tel:+15551234567" style="color: inherit; text-decoration: none;">+1 (555) 123-4567</a><br>
                              <a href="tel:+15559876543" style="color: inherit; text-decoration: none;">+1 (555) 987-6543</a></p>
                        </div>
                     </div>
                     
                     <div class="contact-info-item">
                        <div class="contact-icon">
                           <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                           <h5>Email</h5>
                           <p><a href="mailto:info@luxuryhotel.com" style="color: inherit; text-decoration: none;">info@luxuryhotel.com</a><br>
                              <a href="mailto:bookings@luxuryhotel.com" style="color: inherit; text-decoration: none;">bookings@luxuryhotel.com</a></p>
                        </div>
                     </div>
                     
                     <div class="contact-info-item">
                        <div class="contact-icon">
                           <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-info-content">
                           <h5>Operating Hours</h5>
                           <p>24/7 Front Desk<br>Concierge: 6:00 AM - 11:00 PM</p>
                        </div>
                     </div>
                     
                     @if($user)
                     <div style="margin-top: 30px; padding: 25px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); border-radius: 12px; text-align: center;">
                        <h5 style="color: white; margin-bottom: 10px;">{{ $user->name }}, we're here for you!</h5>
                        <p style="color: #e0e6ff; margin: 0; font-size: 0.95rem;">As a registered member, you can also access your bookings and preferences through your dashboard.</p>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
            
            <!-- Map Section -->
            <div class="row">
               <div class="col-md-12">
                  <div class="map-section">
                     <h3 style="margin-bottom: 25px; color: var(--text-dark);">Find Us</h3>
                     <div class="map-placeholder">
                        <i class="fas fa-map-marker-alt" style="font-size: 3rem; color: var(--accent-color); margin-bottom: 15px;"></i>
                        <p style="font-size: 1.2rem; margin-bottom: 5px;">Interactive Map Coming Soon</p>
                        <small>123 Luxury Street, Hotel District, City Center</small>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- footer -->
      @include('home.footer')
      
      <!-- Optimized JavaScript -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      
      <script>
      $(document).ready(function() {
         // Hide loader efficiently
         $('.loader_bg').fadeOut(800);
         
         // Form validation and submission
         $('#contactForm').on('submit', function() {
            $('#submitBtn').html('<div class="loading-animation" style="width: 16px; height: 16px; margin-right: 8px; display: inline-block;"></div>Sending...');
            $('#submitBtn').prop('disabled', true);
         });
         
         // Lazy load animations
         const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
         };
         
         const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
               if (entry.isIntersecting) {
                  entry.target.classList.add('loaded');
                  observer.unobserve(entry.target);
               }
            });
         }, observerOptions);
         
         $('.contact-card, .contact-info-item').each(function() {
            $(this).addClass('lazy-load');
            observer.observe(this);
         });
         
         // Enhance form UX
         $('.form-control').on('focus', function() {
            $(this).parent().addClass('focused');
         }).on('blur', function() {
            $(this).parent().removeClass('focused');
         });
         
         // Performance monitoring
         console.log('Contact page loaded successfully');
         
         // Preload critical images
         const criticalImages = ['{{ asset("images/loading.gif") }}'];
         criticalImages.forEach(src => {
            const img = new Image();
            img.src = src;
         });
      });
      
      // Service Worker for better performance (if available)
      if ('serviceWorker' in navigator) {
         window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
               console.log('SW registered: ', registration);
            }).catch(function(registrationError) {
               console.log('SW registration failed: ', registrationError);
            });
         });
      }
      </script>
   </body>
</html>
