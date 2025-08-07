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
   <title>Our Rooms - Hotel Management</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

   <style>
      .our_room {
         padding: 60px 0;
         background: #f8f9fa;
      }

      .room {
         background: white;
         border-radius: 15px;
         overflow: hidden;
         margin-bottom: 30px;
         box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
         transition: all 0.3s ease;
      }

      .room:hover {
         transform: translateY(-10px);
         box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
      }

      .room_img img {
         width: 100%;
         height: 250px;
         object-fit: cover;
         transition: transform 0.3s ease;
      }

      .room:hover .room_img img {
         transform: scale(1.05);
      }

      .bed_room {
         padding: 25px;
      }

      .room-price {
         background: linear-gradient(135deg, #fe0000, #ff4444);
         color: white;
         padding: 8px 20px;
         border-radius: 25px;
         font-weight: bold;
         display: inline-block;
         margin-bottom: 15px;
      }

      .room-features {
         display: flex;
         gap: 15px;
         margin-bottom: 20px;
         flex-wrap: wrap;
      }

      .feature-item {
         background: #f8f9fa;
         padding: 5px 12px;
         border-radius: 20px;
         font-size: 0.9rem;
         color: #666;
      }
   </style>
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="Loading..." /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      @include('home.header')
   </header>
   <!-- end header inner -->

   <!-- Rooms Banner -->
   <div class="back_re" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 50px 0;">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title text-center">
                  @if($user)
                  <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Welcome {{ $user->name }}!</h2>
                  <p style="color: #e0e6ff; font-size: 1.2rem;">Discover our luxurious accommodations</p>
                  @else
                  <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Our Rooms</h2>
                  <p style="color: #e0e6ff; font-size: 1.2rem;">Choose from our selection of luxury accommodations</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Our Rooms Section -->
   <div class="our_room">
      <div class="container">
         @if($user)
         <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-12">
               <div class="user-welcome" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 15px; text-align: center;">
                  <h4 style="color: white; margin-bottom: 10px;">Hello {{ $user->name }}!</h4>
                  <p style="color: #e0e6ff; margin: 0; font-size: 1.1rem; margin-bottom: 20px;">Browse our available rooms and book your perfect stay with us.</p>
                  
                  <!-- My Bookings Button -->
                  <div style="margin-top: 15px;">
                     <a href="{{ route('my.bookings') }}" class="btn" style="background: rgba(254,0,0,0.8); color: white; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; border: 2px solid #fe0000; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;" onmouseover="this.style.background='#fe0000'" onmouseout="this.style.background='rgba(254,0,0,0.8)'">
                        <i class="fa fa-calendar"></i> My Bookings
                        @php
                            $userBookingsCount = \App\Models\Booking::where('email', Auth::user()->email)
                                ->whereIn('status', ['pending', 'confirmed'])
                                ->count();
                        @endphp
                        @if($userBookingsCount > 0)
                            <span style="background: #fff; color: #fe0000; font-size: 0.8rem; padding: 2px 8px; border-radius: 12px; margin-left: 5px; font-weight: bold;">{{ $userBookingsCount }}</span>
                        @endif
                     </a>
                  </div>
               </div>
            </div>
         </div>
         @endif

         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 20px; text-align: center;">Our Accommodation Options</h2>
                  <p style="font-size: 1.1rem; color: #666; text-align: center; margin-bottom: 50px;">
                     @if($rooms->count() > 0)
                     Showing {{ $rooms->count() }} available rooms
                     @else
                     No rooms available at the moment
                     @endif
                  </p>
               </div>
            </div>
         </div>

         @if($rooms->count() > 0)
         <div class="row">
            @foreach($rooms as $room)
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover" class="room">
                  <div class="room_img">
                     @if($room->image && file_exists(public_path('room/'.$room->image)))
                     <figure><img src="room/{{$room->image}}" alt="{{$room->room_title}}" loading="lazy" onerror="this.src='images/room1.jpg'" /></figure>
                     @else
                     <figure><img src="images/room1.jpg" alt="{{$room->room_title}}" loading="lazy" /></figure>
                     @endif
                  </div>
                  <div class="bed_room">
                     <h3 style="color: #333; font-size: 1.5rem; margin-bottom: 15px;">{{$room->room_title}}</h3>

                     <div class="room-price">
                        ${{number_format($room->price, 0)}}/night
                     </div>

                     <div class="room-features">
                        <span class="feature-item">
                           <i class="fa fa-bed"></i> {{ucfirst($room->room_type ?? 'Standard')}}
                        </span>
                        @if($room->capacity)
                        <span class="feature-item">
                           <i class="fa fa-users"></i> {{$room->capacity}} Guest{{$room->capacity > 1 ? 's' : ''}}
                        </span>
                        @endif
                        @if($room->wifi === 'yes' || $room->wifi === 1)
                        <span class="feature-item">
                           <i class="fa fa-wifi"></i> Free WiFi
                        </span>
                        @endif
                     </div>

                     <p style="color: #666; margin-bottom: 20px; line-height: 1.6;">
                        {{Str::limit($room->description ?? 'Experience comfort and luxury in this beautifully appointed room with modern amenities and elegant furnishings.', 120)}}
                     </p>

                     <div class="room-actions" style="display: flex; gap: 10px; align-items: center;">
                        <a href="{{url('room-details', $room->id)}}" class="btn btn-secondary" style="background: #6c757d; border: none; padding: 12px 20px; border-radius: 25px; font-weight: bold; text-decoration: none; color: white; flex: 1; text-align: center;">
                           View Details
                        </a>
                        @if($room->status === 'available')
                        <a href="{{ route('room.book', $room->id) }}" class="btn btn-primary" style="background: #fe0000; border: none; padding: 12px 20px; border-radius: 25px; font-weight: bold; text-decoration: none; color: white; flex: 1; text-align: center;">
                           Book Now
                        </a>
                        @else
                        <span style="background: #dc3545; color: white; padding: 12px 20px; border-radius: 25px; font-size: 0.9rem; font-weight: bold; flex: 1; text-align: center;">
                           Occupied
                        </span>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>

         @if($user)
         <div class="row" style="margin-top: 50px;">
            <div class="col-md-12 text-center">
               <div style="background: #f8f9fa; padding: 30px; border-radius: 15px;">
                  <h4 style="color: #333; margin-bottom: 15px;">Ready to Book, {{ $user->name }}?</h4>
                  <p style="color: #666; margin-bottom: 20px;">Choose your preferred room and enjoy our luxury accommodation with personalized service.</p>
                  <a href="{{ url('contact_us') }}" class="btn" style="background: #fe0000; color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">Contact Us for Booking</a>
               </div>
            </div>
         </div>
         @endif

         @else
         <div class="row">
            <div class="col-md-12 text-center">
               <div style="padding: 60px; background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                  <i class="fa fa-bed" style="font-size: 4rem; color: #ccc; margin-bottom: 20px;"></i>
                  <h3 style="color: #666; margin-bottom: 15px;">No Rooms Available</h3>
                  <p style="color: #999;">We're currently updating our room inventory. Please check back soon!</p>
                  <a href="{{ url('/') }}" class="btn" style="background: #fe0000; color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: bold; margin-top: 20px;">Return to Homepage</a>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>

   <!-- footer -->
   @include('home.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>

   <script>
      // Ensure page loads properly and handle any loading issues
      $(document).ready(function() {
         console.log('Our Rooms page loaded successfully');

         // Hide loader after page is fully loaded
         setTimeout(function() {
            $('.loader_bg').fadeOut();
         }, 1000);

         // Add error handling for images
         $('img').on('error', function() {
            console.log('Image failed to load:', $(this).attr('src'));
            $(this).attr('src', 'images/room1.jpg');
         });
      });

      // Prevent infinite loading by setting a maximum timeout
      setTimeout(function() {
         if ($('.loader_bg').is(':visible')) {
            console.log('Force hiding loader after timeout');
            $('.loader_bg').hide();
         }
      }, 5000);
   </script>
</body>

</html>