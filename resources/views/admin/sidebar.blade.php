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
          <li class="{{ request()->is('create_room') || request()->is('view_room') ? 'active' : '' }}">
               <a href="#exampledropdownDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
               <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ request()->is('create_room') || request()->is('view_room') ? 'show' : '' }}">
                    <li class="{{ request()->is('create_room') ? 'active' : '' }}"><a href="{{url('create_room')}}"> <i class="icon-plus"></i> Add Room</a></li>
                    <li class="{{ request()->is('view_room') ? 'active' : '' }}"><a href="{{url('view_room')}}"> <i class="icon-grid"></i> View Rooms</a></li>
               </ul>
          </li>
          <li class="{{ request()->is('admin/contacts*') ? 'active' : '' }}">
               <a href="{{ route('admin.contacts') }}"> <i class="icon-email"></i>Contact Messages 
                    @php
                        $newContactsCount = \App\Models\Contact::where('status', 'new')->count();
                    @endphp
                    @if($newContactsCount > 0)
                        <span class="badge badge-danger ml-2">{{ $newContactsCount }}</span>
                    @endif
               </a>
          </li>
     </ul>
</nav>