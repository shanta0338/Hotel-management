<!-- header inner -->
<div class="header linear-header">
   <div class="container-fluid">
      <div class="row align-items-center" style="min-height: 60px;">
         <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col logo_section">
            <div class="full">
               <div class="center-desk">
                  <div class="logo">
                     <!-- Logo removed -->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
            <nav class="navigation navbar navbar-expand-md navbar-dark">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav w-100 d-flex justify-content-center align-items-center" style="gap: 5px; padding: 5px 0; flex-wrap: nowrap; display: flex !important; flex-direction: row !important;">
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('homepage') }}">
                           <i class="fa fa-home"></i> Home
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('our_rooms') }}">
                           <i class="fa fa-bed"></i> Our Rooms
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('about_us') }}">
                           <i class="fa fa-info-circle"></i> About Us
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('gallery') }}">
                           <i class="fa fa-picture-o"></i> Gallery
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('blog') }}">
                           <i class="fa fa-newspaper-o"></i> Blog
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('contact_us') }}">
                           <i class="fa fa-envelope"></i> Contact Us
                        </a>
                     </li>
                     
                     <!-- Authentication Links in same line -->
                     @if (Route::has('login'))
                     @auth
                     <!-- My Bookings Link for Authenticated Users -->
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('my.bookings') }}">
                           <i class="fa fa-calendar"></i> My Bookings
                           @php
                              $userBookingsCount = \App\Models\Booking::where('email', Auth::user()->email)
                                  ->whereIn('status', ['pending', 'confirmed'])
                                  ->count();
                           @endphp
                           @if($userBookingsCount > 0)
                              <span class="booking-badge">{{ $userBookingsCount }}</span>
                           @endif
                        </a>
                     </li>
                     @if(Auth::user()->usertype === 'admin')
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('view_room') }}">
                           <i class="fa fa-cog"></i> Admin Panel
                        </a>
                     </li>
                     @endif

                     <!-- User Profile Direct Logout -->
                     <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                           @csrf
                           <button type="submit" class="nav-link nav-btn" style="border: none; background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border: 2px solid rgba(254, 0, 0, 0.25); border-radius: 20px; padding: 6px 12px; margin: 0 2px; color: #333; font-weight: 600; text-transform: capitalize; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); display: inline-flex; align-items: center; text-decoration: none; white-space: nowrap; position: relative; font-size: 11px; letter-spacing: 0.3px; min-height: 32px; flex-shrink: 0; justify-content: center; cursor: pointer;"
                           onmouseover="this.style.background='linear-gradient(135deg, #fe0000 0%, #ff4444 100%)'; this.style.color='white'; this.style.transform='translateY(-1px) scale(1.02)'; this.style.boxShadow='0 4px 15px rgba(254, 0, 0, 0.3)'; this.style.borderColor='#fe0000';"
                           onmouseout="this.style.background='linear-gradient(135deg, #fff 0%, #f8f9fa 100%)'; this.style.color='#333'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.borderColor='rgba(254, 0, 0, 0.25)';">
                              <i class="fa fa-user-circle" style="margin-right: 4px; font-size: 12px; transition: all 0.3s ease;"></i> {{ Auth::user()->name }}
                           </button>
                        </form>
                     </li>
                     @else
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('login') }}">
                           <i class="fa fa-sign-in"></i> Log in
                        </a>
                     </li>

                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ route('register') }}">
                           <i class="fa fa-user-plus"></i> Register
                        </a>
                     </li>
                     @endif
                     @endauth
                     @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>

<style>
/* Enhanced Header Styles */
.header {
   box-shadow: 0 3px 15px rgba(0,0,0,0.12);
   background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
   border-bottom: 4px solid #fe0000;
   position: relative;
   margin-bottom: 0;
   padding: 15px 0;
   min-height: 70px;
}

/* Linear Header Compact Style */
.linear-header {
   padding: 10px 0 !important;
   min-height: 60px !important;
}

.linear-header .container {
   padding: 0 15px !important;
}

.linear-header .row {
   align-items: center !important;
   min-height: 50px !important;
}

/* Additional Linear Header Styles */
.linear-header .navigation {
   width: 100%;
   overflow: visible;
   min-height: 45px;
}

/* Enhanced Logo Styles */
.hotel-logo {
   display: flex;
   align-items: center;
   justify-content: center;
   flex-wrap: wrap;
}

.logo h2 {
   font-family: 'Rajdhani', sans-serif !important;
   font-size: 22px !important;
   letter-spacing: 3px;
   text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
   transition: all 0.3s ease;
   white-space: nowrap;
}

.logo:hover h2 {
   transform: scale(1.05);
   box-shadow: 0 8px 25px rgba(254, 0, 0, 0.35);
}

/* Enhanced Navigation Button Styling */
.nav-btn {
   background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%) !important;
   border: 2px solid rgba(254, 0, 0, 0.25) !important;
   border-radius: 20px !important;
   padding: 6px 12px !important;
   margin: 0 2px !important;
   color: #333 !important;
   font-weight: 600 !important;
   text-transform: capitalize !important;
   transition: all 0.3s ease !important;
   box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
   display: inline-flex !important;
   align-items: center !important;
   text-decoration: none !important;
   white-space: nowrap !important;
   position: relative !important;
   font-size: 11px !important;
   letter-spacing: 0.2px !important;
   min-height: 32px !important;
   flex-shrink: 0 !important;
   justify-content: center !important;
}

.nav-btn i {
   margin-right: 4px !important;
   font-size: 12px !important;
   transition: all 0.3s ease !important;
}

.nav-btn:hover {
   background: linear-gradient(135deg, #fe0000 0%, #ff4444 100%) !important;
   color: white !important;
   transform: translateY(-1px) scale(1.02) !important;
   box-shadow: 0 4px 15px rgba(254, 0, 0, 0.3) !important;
   border-color: #fe0000 !important;
}

.nav-btn:hover i {
   transform: scale(1.1) !important;
   color: white !important;
}

/* Enhanced Navigation Container */
.navbar-nav {
   align-items: center !important;
   flex-wrap: nowrap !important;
   gap: 3px !important;
   position: relative !important;
   padding: 5px 0 !important;
   justify-content: center !important;
   width: 100% !important;
   display: flex !important;
   flex-direction: row !important;
}

.nav-item {
   margin: 0 !important;
   position: relative !important;
   flex-shrink: 0 !important;
   display: inline-block !important;
}

/* Horizontal Linear Navigation */
.navbar-collapse {
   display: flex !important;
   justify-content: center !important;
   align-items: center !important;
}

.navbar-nav ul {
   display: flex !important;
   flex-direction: row !important;
   align-items: center !important;
   margin: 0 !important;
   padding: 0 !important;
}

/* Enhanced Container and Row */
.header .container-fluid {
   max-width: 100%;
   position: relative !important;
   padding: 0 15px;
}

.header .row {
   min-height: 50px;
   position: relative !important;
   align-items: center;
}

/* Enhanced Logo Section */
.logo_section {
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 20px;
   position: relative !important;
}

.center-desk {
   width: 100%;
   display: flex;
   justify-content: center;
   align-items: center;
   position: relative !important;
}

/* Prevent interference with page content */
.navigation {
   position: relative !important;
}

.navigation .navbar-collapse {
   position: relative !important;
}

/* Dropdown menu fixes */
.dropdown-menu {
   position: absolute !important;
   z-index: 1050 !important;
   top: 100% !important;
   left: 0 !important;
   right: auto !important;
}

.user-menu {
   position: absolute !important;
   z-index: 1050 !important;
}

/* Navigation Enhancements */
.navigation.navbar-dark .navbar-nav .nav-link {
   position: relative;
   transition: all 0.3s ease;
   font-weight: 600;
   text-transform: capitalize;
   padding: 12px 15px !important;
   margin: 0 5px;
   border-radius: 5px;
}

.navigation.navbar-dark .navbar-nav .nav-link i {
   margin-right: 8px;
   font-size: 16px;
   transition: all 0.3s ease;
}

.navigation.navbar-dark .navbar-nav .nav-link:hover {
   background: rgba(254, 0, 0, 0.1);
   transform: translateY(-2px);
   box-shadow: 0 4px 8px rgba(254, 0, 0, 0.2);
}

.navigation.navbar-dark .navbar-nav .nav-link:hover i {
   transform: scale(1.2);
   color: #fe0000;
}

.navigation.navbar-dark .navbar-nav .nav-link::after {
   content: '';
   position: absolute;
   width: 0;
   height: 2px;
   bottom: 5px;
   left: 50%;
   background-color: #fe0000;
   transition: all 0.3s ease;
   transform: translateX(-50%);
}

.navigation.navbar-dark .navbar-nav .nav-link:hover::after {
   width: 80%;
}

/* Enhanced Authentication Button Styles */
.auth-btn {
   margin: 0 8px;
   padding: 12px 25px;
   border-radius: 30px;
   font-weight: 700;
   text-transform: uppercase;
   letter-spacing: 1.2px;
   transition: all 0.4s ease;
   border: none;
   box-shadow: 0 4px 12px rgba(0,0,0,0.15);
   font-size: 13px;
   position: relative;
   overflow: hidden;
}

.auth-btn::before {
   content: '';
   position: absolute;
   top: 0;
   left: -100%;
   width: 100%;
   height: 100%;
   background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
   transition: left 0.5s ease;
}

.auth-btn:hover::before {
   left: 100%;
}

.login-btn {
   background: linear-gradient(45deg, #28a745, #20c997);
   color: white !important;
}

.login-btn:hover {
   background: linear-gradient(45deg, #20c997, #28a745);
   transform: translateY(-3px) scale(1.05);
   box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
   color: white !important;
}

.register-btn {
   background: linear-gradient(45deg, #007bff, #17a2b8);
   color: white !important;
}

.register-btn:hover {
   background: linear-gradient(45deg, #17a2b8, #007bff);
   transform: translateY(-3px) scale(1.05);
   box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
   color: white !important;
}

/* Quick Logout Button Styling */
.logout-quick-btn {
   background: linear-gradient(45deg, #dc3545, #e74c3c) !important;
   color: white !important;
   border: 2px solid rgba(220, 53, 69, 0.3) !important;
   font-weight: 700 !important;
   text-transform: uppercase !important;
   letter-spacing: 1px !important;
   transition: all 0.4s ease !important;
   box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3) !important;
}

.logout-quick-btn:hover {
   background: linear-gradient(45deg, #e74c3c, #dc3545) !important;
   color: white !important;
   transform: translateY(-3px) scale(1.05) !important;
   box-shadow: 0 8px 20px rgba(220, 53, 69, 0.5) !important;
   border-color: #dc3545 !important;
}

.admin-btn {
   background: linear-gradient(45deg, #ffc107, #fd7e14);
   border: none;
   border-radius: 25px;
   padding: 12px 20px;
   font-weight: 700;
   margin-right: 15px;
   transition: all 0.4s ease;
   color: #333 !important;
   text-transform: uppercase;
   letter-spacing: 1px;
   box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
}

.admin-btn:hover {
   background: linear-gradient(45deg, #fd7e14, #ffc107);
   transform: translateY(-3px) scale(1.05);
   box-shadow: 0 8px 20px rgba(255, 193, 7, 0.5);
   color: #333 !important;
}

/* Enhanced User Dropdown Styles */
.user-link {
   color: #333 !important;
   font-weight: 700;
   padding: 12px 20px;
   border-radius: 25px;
   background: linear-gradient(135deg, rgba(254, 0, 0, 0.1), rgba(254, 0, 0, 0.15));
   transition: all 0.4s ease;
   border: 2px solid rgba(254, 0, 0, 0.2);
   font-size: 14px;
   letter-spacing: 0.5px;
}

.user-link:hover {
   background: linear-gradient(135deg, rgba(254, 0, 0, 0.2), rgba(254, 0, 0, 0.3));
   color: #fe0000 !important;
   transform: translateY(-2px);
   box-shadow: 0 6px 15px rgba(254, 0, 0, 0.3);
   border-color: #fe0000;
}

.user-menu {
   border: none;
   box-shadow: 0 8px 30px rgba(0,0,0,0.2);
   border-radius: 15px;
   min-width: 220px;
   padding: 15px 0;
}

.user-menu .dropdown-item {
   padding: 12px 20px;
   color: #333;
   transition: all 0.3s ease;
   border-left: 3px solid transparent;
   display: flex;
   align-items: center;
}

.user-menu .dropdown-item:hover {
   background: linear-gradient(135deg, rgba(254, 0, 0, 0.1), rgba(254, 0, 0, 0.15));
   color: #fe0000;
   border-left-color: #fe0000;
   transform: translateX(5px);
}

.user-menu .dropdown-item i {
   margin-right: 10px;
   width: 16px;
   text-align: center;
}

.booking-badge {
   background: #fe0000 !important;
   color: white !important;
   font-size: 0.75rem;
   padding: 2px 6px;
   border-radius: 10px;
   margin-left: 8px;
   font-weight: bold;
   animation: pulse 2s infinite;
}

@keyframes pulse {
   0% { transform: scale(1); }
   50% { transform: scale(1.1); }
   100% { transform: scale(1); }
}

/* Special styling for My Bookings button */
.nav-btn[href*="my-bookings"] {
   background: linear-gradient(135deg, rgba(254, 0, 0, 0.1) 0%, rgba(254, 0, 0, 0.05) 100%) !important;
   border-color: rgba(254, 0, 0, 0.4) !important;
   position: relative !important;
}

.nav-btn[href*="my-bookings"]:hover {
   background: linear-gradient(135deg, #fe0000 0%, #ff4444 100%) !important;
   transform: translateY(-2px) scale(1.05) !important;
   box-shadow: 0 6px 20px rgba(254, 0, 0, 0.4) !important;
}

/* User Menu Additional Styles */
.user-menu {
   border-radius: 15px;
   padding: 15px 0;
   margin-top: 12px;
   background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
   min-width: 200px;
}

.user-menu .dropdown-item {
   padding: 12px 25px;
   transition: all 0.3s ease;
   font-weight: 600;
   border-radius: 8px;
   margin: 2px 10px;
   font-size: 14px;
}

.user-menu .dropdown-item:hover {
   background: linear-gradient(135deg, rgba(254, 0, 0, 0.1), rgba(254, 0, 0, 0.15));
   color: #fe0000;
   transform: translateX(5px);
}

.logout-btn {
   border: none;
   background: none;
   width: 100%;
   text-align: left;
   padding: 12px 25px;
   transition: all 0.3s ease;
   font-weight: 600;
   border-radius: 8px;
   margin: 2px 10px;
   font-size: 14px;
}

.logout-btn:hover {
   background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.15)) !important;
   color: #dc3545 !important;
   transform: translateX(5px);
}

/* Enhanced Mobile Responsive */
@media (max-width: 768px) {
   .header {
      height: auto;
      padding: 25px 0;
      min-height: auto;
   }
   
   .header .row {
      flex-direction: column;
      text-align: center;
      min-height: auto;
      gap: 20px;
   }
   
   .logo_section {
      margin-bottom: 25px;
      order: 1;
      padding: 15px;
   }
   
   .hotel-logo {
      flex-direction: column;
      gap: 15px;
   }
   
   .hotel-logo i {
      font-size: 28px !important;
      margin-right: 0 !important;
   }
   
   .logo h2 {
      font-size: 18px !important;
      text-align: center;
      padding: 18px 25px !important;
      margin: 0 auto !important;
      max-width: 280px;
      letter-spacing: 2px !important;
   }
   
   .navigation {
      order: 2;
      width: 100%;
   }
   
   .navbar-nav {
      flex-direction: column !important;
      align-items: center !important;
      width: 100% !important;
      gap: 20px !important;
      padding: 20px 0 !important;
   }
   
   .nav-btn {
      width: 85% !important;
      text-align: center !important;
      justify-content: center !important;
      margin: 10px auto !important;
      padding: 18px 30px !important;
      font-size: 15px !important;
      min-height: 55px !important;
   }
   
   .auth-btn {
      margin: 8px auto !important;
      width: 40% !important;
      display: inline-block !important;
      font-size: 12px !important;
      padding: 14px 20px !important;
   }
   
   .logout-quick-btn {
      width: 85% !important;
      margin: 8px auto !important;
      padding: 16px 25px !important;
   }
   
   .navbar-nav.ml-auto {
      flex-direction: row !important;
      justify-content: center !important;
      flex-wrap: wrap !important;
      margin-top: 20px !important;
      gap: 10px !important;
   }
   
   .user-dropdown {
      width: 85% !important;
      margin: 8px auto !important;
   }
   
   .user-link {
      width: 100% !important;
      text-align: center !important;
      justify-content: center !important;
      padding: 16px 25px !important;
   }
   
   .admin-btn {
      width: 85% !important;
      margin: 8px auto 15px auto !important;
      text-align: center !important;
      padding: 16px 25px !important;
   }
}

@media (max-width: 576px) {
   .nav-btn {
      font-size: 14px !important;
      padding: 14px 20px !important;
      width: 90% !important;
   }
   
   .hotel-logo i {
      font-size: 24px !important;
   }
   
   .logo h2 {
      font-size: 16px !important;
      padding: 12px 18px !important;
      letter-spacing: 1.5px !important;
   }
   
   .auth-btn {
      width: 45% !important;
      margin: 5px 2% !important;
      font-size: 11px !important;
      padding: 12px 15px !important;
   }
   
   .logout-quick-btn {
      width: 90% !important;
      font-size: 12px !important;
   }
   
   .user-link {
      font-size: 13px !important;
      padding: 14px 20px !important;
   }
   
   .admin-btn {
      font-size: 12px !important;
      padding: 14px 20px !important;
   }
}

/* Desktop Linear Layout Improvements */
@media (min-width: 992px) {
   .navbar-nav {
      justify-content: center !important;
      align-items: center !important;
      flex-direction: row !important;
      flex-wrap: nowrap !important;
      gap: 15px !important;
      width: 100% !important;
   }
   
   .nav-item {
      margin: 0 !important;
      flex-shrink: 0 !important;
   }
   
   .nav-btn {
      padding: 12px 18px !important;
      font-size: 13px !important;
      margin: 0 3px !important;
   }
   
   .header .row {
      align-items: center;
   }
   
   .logo_section {
      display: flex;
      align-items: center;
      height: 100%;
   }
   
   .navigation {
      display: flex;
      align-items: center;
      height: 100%;
   }
   
   .navbar-collapse {
      justify-content: center !important;
   }
}

/* Extra wide screens - more spacing */
@media (min-width: 1200px) {
   .navbar-nav {
      gap: 20px !important;
   }
   
   .nav-btn {
      padding: 12px 20px !important;
      margin: 0 5px !important;
   }
}

/* Navbar Toggler Custom Style */
.navbar-toggler {
   border: 2px solid #fe0000;
   padding: 4px 8px;
   position: relative !important;
}

.navbar-toggler-icon {
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23fe0000' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.navbar-toggler:focus {
   box-shadow: 0 0 0 0.2rem rgba(254, 0, 0, 0.25);
}

/* Reset any problematic styles that could interfere with page content */
.banner_main,
.carousel,
.carousel-inner,
.carousel-item {
   position: relative !important;
   z-index: auto !important;
}

.carousel-item img {
   width: 100% !important;
   height: auto !important;
   display: block !important;
}

/* Ensure header doesn't interfere with banner */
.header + .banner_main {
   margin-top: 0 !important;
}

/* Make sure carousel controls work properly */
.carousel-control-prev,
.carousel-control-next {
   z-index: 5 !important;
}

/* Dropdown menu positioning */
.dropdown-menu {
   z-index: 1055 !important;
}
</style>