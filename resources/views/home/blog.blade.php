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
      <title>Blog - Hotel Management</title>
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
      
      <!-- Blog Banner -->
      <div class="back_re" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 50px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title text-center">
                     @if($user)
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Welcome {{ $user->name }}!</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Discover hotel insights and travel tips</p>
                     @else
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Hotel Blog</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Stay updated with hospitality insights and travel tips</p>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="blog" style="padding: 80px 0; background: #f8f9fa;">
         <div class="container">
            @if($user)
            <div class="row" style="margin-bottom: 40px;">
               <div class="col-md-12">
                  <div class="user-welcome" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 15px; text-align: center;">
                     <h4 style="color: white; margin-bottom: 10px;">Hello {{ $user->name }}!</h4>
                     <p style="color: #e0e6ff; margin: 0; font-size: 1.1rem;">Explore our latest articles about luxury hospitality and travel experiences.</p>
                  </div>
               </div>
            </div>
            @endif
            
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text-center" style="margin-bottom: 50px;">
                     <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 20px;">Latest Blog Posts</h2>
                     <p style="color: #666; font-size: 1.1rem;">Discover insights, tips, and stories from the world of luxury hospitality</p>
                  </div>
               </div>
            </div>
            
            <div class="row">
               <div class="col-md-4" style="margin-bottom: 30px;">
                  <div class="blog_box" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                     <div class="blog_img">
                        <figure style="margin: 0; overflow: hidden;">
                           <img src="images/blog1.jpg" alt="Luxury Room Design" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                        </figure>
                     </div>
                     <div class="blog_room" style="padding: 25px;">
                        <h3 style="color: #333; font-size: 1.4rem; margin-bottom: 10px;">Modern Room Design Trends</h3>
                        <span style="color: #fe0000; font-weight: bold; font-size: 0.9rem;">Hotel Design</span>
                        <p style="color: #666; margin: 15px 0; line-height: 1.6;">Discover the latest trends in luxury hotel room design, from minimalist aesthetics to smart technology integration that enhances guest experience.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                           <span style="color: #999; font-size: 0.9rem;">
                              <i class="fa fa-calendar"></i> March 15, 2024
                           </span>
                           <a href="#" style="color: #fe0000; font-weight: bold; text-decoration: none;">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-4" style="margin-bottom: 30px;">
                  <div class="blog_box" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                     <div class="blog_img">
                        <figure style="margin: 0; overflow: hidden;">
                           <img src="images/blog2.jpg" alt="Hotel Services" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                        </figure>
                     </div>
                     <div class="blog_room" style="padding: 25px;">
                        <h3 style="color: #333; font-size: 1.4rem; margin-bottom: 10px;">Excellence in Guest Services</h3>
                        <span style="color: #fe0000; font-weight: bold; font-size: 0.9rem;">Customer Service</span>
                        <p style="color: #666; margin: 15px 0; line-height: 1.6;">Learn how our dedicated staff creates memorable experiences through personalized service and attention to detail that exceeds expectations.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                           <span style="color: #999; font-size: 0.9rem;">
                              <i class="fa fa-calendar"></i> March 10, 2024
                           </span>
                           <a href="#" style="color: #fe0000; font-weight: bold; text-decoration: none;">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-4" style="margin-bottom: 30px;">
                  <div class="blog_box" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                     <div class="blog_img">
                        <figure style="margin: 0; overflow: hidden;">
                           <img src="images/blog3.jpg" alt="Sustainable Hospitality" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                        </figure>
                     </div>
                     <div class="blog_room" style="padding: 25px;">
                        <h3 style="color: #333; font-size: 1.4rem; margin-bottom: 10px;">Sustainable Hospitality Practices</h3>
                        <span style="color: #fe0000; font-weight: bold; font-size: 0.9rem;">Sustainability</span>
                        <p style="color: #666; margin: 15px 0; line-height: 1.6;">Explore our commitment to environmental responsibility through eco-friendly practices while maintaining luxury standards for our guests.</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                           <span style="color: #999; font-size: 0.9rem;">
                              <i class="fa fa-calendar"></i> March 5, 2024
                           </span>
                           <a href="#" style="color: #fe0000; font-weight: bold; text-decoration: none;">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <!-- Featured Rooms Section -->
            @if($rooms->count() > 0)
            <div class="row" style="margin-top: 60px;">
               <div class="col-md-12">
                  <h3 style="color: #333; text-align: center; margin-bottom: 40px;">Featured Accommodations</h3>
               </div>
               @foreach($rooms->take(3) as $room)
               <div class="col-md-4" style="margin-bottom: 30px;">
                  <div class="room-feature" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; padding: 25px;">
                     @if($room->image && file_exists(public_path('room/'.$room->image)))
                        <img src="room/{{$room->image}}" alt="{{$room->room_title}}" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;"/>
                     @else
                        <img src="images/room1.jpg" alt="{{$room->room_title}}" loading="lazy" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 20px;"/>
                     @endif
                     <h4 style="color: #333; margin-bottom: 10px;">{{$room->room_title}}</h4>
                     <p style="color: #fe0000; font-weight: bold; margin-bottom: 15px;">${{number_format($room->price, 0)}}/night</p>
                     <a href="{{url('room-details', $room->id)}}" class="btn" style="background: #fe0000; color: white; padding: 10px 25px; border: none; border-radius: 25px; text-decoration: none; font-weight: bold;">View Details</a>
                  </div>
               </div>
               @endforeach
            </div>
            @endif
            
            @if($user)
            <div class="row" style="margin-top: 50px;">
               <div class="col-md-12 text-center">
                  <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                     <h4 style="color: #333; margin-bottom: 15px;">Enjoy Reading, {{ $user->name }}?</h4>
                     <p style="color: #666; margin-bottom: 20px;">Subscribe to our newsletter for more exclusive content and special offers.</p>
                     <a href="{{ url('contact_us') }}" class="btn" style="background: #fe0000; color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">Stay Connected</a>
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
         console.log('Blog page loaded successfully');
         
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
      
      <style>
         .blog_box:hover {
             transform: translateY(-5px);
             box-shadow: 0 15px 30px rgba(0,0,0,0.15);
         }
         
         .blog_box:hover .blog_img img {
             transform: scale(1.05);
         }
      </style>
   </body>
</html>
