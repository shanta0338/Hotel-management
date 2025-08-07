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
      <title>Gallery - Hotel Management</title>
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
      
      <!-- Gallery Banner -->
      <div class="back_re" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 50px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title text-center">
                     @if($user)
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Welcome {{ $user->name }}!</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Explore our stunning hotel gallery</p>
                     @else
                        <h2 style="color: white; font-size: 3rem; margin-bottom: 20px;">Hotel Gallery</h2>
                        <p style="color: #e0e6ff; font-size: 1.2rem;">Discover the beauty of our luxury hotel</p>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="gallery" style="padding: 80px 0; background: #f8f9fa;">
         <div class="container">
            @if($user)
            <div class="row" style="margin-bottom: 40px;">
               <div class="col-md-12">
                  <div class="user-welcome" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 15px; text-align: center;">
                     <h4 style="color: white; margin-bottom: 10px;">Hello {{ $user->name }}!</h4>
                     <p style="color: #e0e6ff; margin: 0; font-size: 1.1rem;">Take a visual tour of our beautiful hotel and room accommodations.</p>
                  </div>
               </div>
            </div>
            @endif
            
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text-center" style="margin-bottom: 50px;">
                     <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 20px;">Hotel Gallery</h2>
                     <p style="color: #666; font-size: 1.1rem;">Discover the elegance and luxury that awaits you</p>
                  </div>
               </div>
            </div>
            
            <!-- Room Images from Database -->
            @if($rooms->count() > 0)
            <div class="row" style="margin-bottom: 50px;">
               <div class="col-md-12">
                  <h3 style="color: #333; text-align: center; margin-bottom: 30px;">Our Room Collection</h3>
               </div>
               @foreach($rooms as $room)
               <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="position: relative; overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="room/{{$room->image}}" alt="{{$room->room_title}}" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                     <div class="gallery-overlay" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); padding: 20px; color: white; transform: translateY(100%); transition: transform 0.3s ease;">
                        <h5 style="margin-bottom: 5px;">{{$room->room_title}}</h5>
                        <p style="margin: 0; font-size: 0.9rem;">${{number_format($room->price, 0)}}/night</p>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @endif
            
            <!-- Static Gallery Images -->
            <div class="row">
               <div class="col-md-12">
                  <h3 style="color: #333; text-align: center; margin-bottom: 30px;">Hotel Highlights</h3>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery1.jpg" alt="Hotel Lobby" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery2.jpg" alt="Hotel Restaurant" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery3.jpg" alt="Hotel Pool" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery4.jpg" alt="Hotel Spa" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery5.jpg" alt="Hotel Fitness Center" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery6.jpg" alt="Hotel Business Center" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery7.jpg" alt="Hotel Conference Room" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                  <div class="gallery_img" style="overflow: hidden; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                     <figure style="margin: 0; overflow: hidden;">
                        <img src="images/gallery8.jpg" alt="Hotel Exterior" loading="lazy" onerror="this.src='images/room1.jpg'" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"/>
                     </figure>
                  </div>
               </div>
            </div>
            
            @if($user)
            <div class="row" style="margin-top: 50px;">
               <div class="col-md-12 text-center">
                  <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                     <h4 style="color: #333; margin-bottom: 15px;">Ready to Experience This, {{ $user->name }}?</h4>
                     <p style="color: #666; margin-bottom: 20px;">Book your stay and enjoy all these amazing facilities and services.</p>
                     <a href="{{ url('our_rooms') }}" class="btn" style="background: #fe0000; color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: bold;">View Our Rooms</a>
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
         console.log('Gallery page loaded successfully');
         
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
         .gallery_img:hover img {
             transform: scale(1.1);
         }
         
         .gallery_img:hover .gallery-overlay {
             transform: translateY(0);
         }
      </style>
   </body>
</html>
            </div>
         </div>
      </div>
