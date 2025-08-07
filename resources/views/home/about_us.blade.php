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
      <title>About Us - Hotel Management</title>
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
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="Loading..." loading="lazy"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      <!-- end header inner -->
      
      <!-- About Us Banner -->
      <div class="back_re" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 50px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title text-center">
                     @if($user)
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Welcome {{ $user->name }}!</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Learn more about our luxury hotel</p>
                     @else
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">About Our Hotel</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Discover the story behind our luxury experience</p>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- About Content -->
      <div class="about" style="padding: 80px 0;">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2 style="color: #fe0000; font-size: 2.5rem; margin-bottom: 30px;">Our Story</h2>
                     <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                        Welcome to our luxury hotel, where exceptional service meets unparalleled comfort. For over two decades, we have been dedicated to providing our guests with unforgettable experiences that blend modern amenities with timeless elegance.
                     </p>
                     <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                        Our commitment to excellence is reflected in every detail, from our meticulously designed rooms to our world-class dining options. We believe that hospitality is an art, and our team of professionals is passionate about creating memories that last a lifetime.
                     </p>
                     <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 30px;">
                        Located in the heart of the city, our hotel offers easy access to major attractions while providing a peaceful retreat from the bustling urban environment.
                     </p>
                     @if($user)
                        <div class="user-welcome" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; border-radius: 15px; margin-bottom: 30px;">
                           <h4 style="color: white; margin-bottom: 10px;">Hello {{ $user->name }}!</h4>
                           <p style="color: #e0e6ff; margin: 0;">Thank you for being part of our hotel family. Explore our rooms and services to plan your perfect stay.</p>
                        </div>
                     @endif
                     <a class="read_more" href="{{ url('our_rooms') }}" style="background: #fe0000; color: white; padding: 15px 30px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block; transition: all 0.3s ease;">Explore Our Rooms</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img">
                     <figure><img src="images/about.png" alt="About Our Hotel" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Our Values Section -->
      <div class="our_values" style="background: #f8f9fa; padding: 80px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 50px;">Our Values</h2>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 text-center" style="margin-bottom: 40px;">
                  <div class="value-item" style="padding: 30px; background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); height: 100%;">
                     <i class="fa fa-heart" style="font-size: 3rem; color: #fe0000; margin-bottom: 20px;"></i>
                     <h4 style="color: #333; margin-bottom: 15px;">Hospitality</h4>
                     <p>We treat every guest like family, ensuring warmth and care in every interaction.</p>
                  </div>
               </div>
               <div class="col-md-4 text-center" style="margin-bottom: 40px;">
                  <div class="value-item" style="padding: 30px; background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); height: 100%;">
                     <i class="fa fa-star" style="font-size: 3rem; color: #fe0000; margin-bottom: 20px;"></i>
                     <h4 style="color: #333; margin-bottom: 15px;">Excellence</h4>
                     <p>We strive for perfection in every service, from housekeeping to guest relations.</p>
                  </div>
               </div>
               <div class="col-md-4 text-center" style="margin-bottom: 40px;">
                  <div class="value-item" style="padding: 30px; background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); height: 100%;">
                     <i class="fa fa-leaf" style="font-size: 3rem; color: #fe0000; margin-bottom: 20px;"></i>
                     <h4 style="color: #333; margin-bottom: 15px;">Sustainability</h4>
                     <p>We are committed to eco-friendly practices that preserve our environment.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Featured Rooms Section -->
      @if($rooms->count() > 0)
      <div class="our_room" style="padding: 80px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <div class="titlepage">
                     <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 20px;">Featured Accommodations</h2>
                     <p style="font-size: 1.1rem; color: #666; margin-bottom: 50px;">Experience luxury and comfort in our carefully designed rooms</p>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($rooms as $room)
               <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                  <div id="serv_hover" class="room" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                     <div class="room_img">
                        @if($room->image && file_exists(public_path('room/'.$room->image)))
                           <figure><img src="room/{{$room->image}}" alt="{{$room->room_title}}" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover;"/></figure>
                        @else
                           <figure><img src="images/room1.jpg" alt="{{$room->room_title}}" loading="lazy" style="width: 100%; height: 250px; object-fit: cover;"/></figure>
                        @endif
                     </div>
                     <div class="bed_room" style="padding: 25px;">
                        <h3 style="color: #333; font-size: 1.4rem; margin-bottom: 15px;">{{$room->room_title}}</h3>
                        <p style="color: #666; margin-bottom: 15px;">{{Str::limit($room->description ?? 'Luxurious room with modern amenities', 100)}}</p>
                        <div class="room-details" style="margin-bottom: 20px;">
                           <span style="background: #fe0000; color: white; padding: 5px 15px; border-radius: 20px; font-size: 0.9rem; margin-right: 10px;">
                              ${{number_format($room->price, 0)}}/night
                           </span>
                           <span style="color: #666; font-size: 0.9rem;">{{ucfirst($room->room_type ?? 'Standard')}}</span>
                        </div>
                        <a href="{{url('room-details', $room->id)}}" class="btn btn-primary" style="background: #fe0000; border: none; padding: 10px 25px; border-radius: 25px; font-weight: bold; text-decoration: none; color: white; display: inline-block;">View Details</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="row">
               <div class="col-md-12 text-center" style="margin-top: 30px;">
                  <a href="{{ url('our_rooms') }}" class="read_more" style="background: #fe0000; color: white; padding: 15px 30px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">View All Rooms</a>
               </div>
            </div>
         </div>
      </div>
      @endif

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
         console.log('About Us page loaded successfully');
         
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
