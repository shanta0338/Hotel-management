<!-- Sidebar Navigation-->
<nav id="sidebar">
     <!-- Sidebar Header-->
     <div class="sidebar-header d-flex align-items-center">
          <div class="avatar">
               <img src="{{asset('admin/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle">
          </div>
          <div class="title">
               <h1 class="h5">{{Auth::user()->name ?? 'Admin User'}}</h1>
               <p>{{Auth::user()->usertype ?? 'Administrator'}}</p>
          </div>
     </div>
     <!-- Sidebar Navigation Menus--><span class="heading">Admin Panel</span>
     <ul class="list-unstyled">
          <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
               <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('create_room')}}"> Add room</a></li>
                    <li><a href="{{url('view_room')}}">View rooms</a></li>
               </ul>
          </li>
     </ul>
</nav>