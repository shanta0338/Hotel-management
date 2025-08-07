          <!-- Sidebar Navigation end-->
          <div class="page-content" style="padding: 20px;">
               <div class="page-header" style="margin-bottom: 30px;">
                    <div class="container-fluid">
                         <div class="d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 15px; box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
                              <div>
                                   <h2 class="h5 no-margin-bottom" style="color: white; font-weight: 700; font-size: 1.8rem; margin-bottom: 5px;">Hotel Management Dashboard</h2>
                                   <p style="color: #e0e6ff; margin: 0; font-size: 1.1rem; font-weight: 500;">Welcome to your hotel administration panel</p>
                              </div>
                              <div class="quick-actions">
                                   <a href="{{url('create_room')}}" class="btn btn-success btn-sm me-2" style="border-radius: 20px; padding: 10px 20px; font-weight: 600; box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3); margin-right: 10px;">
                                        <i class="icon-plus"></i> Add Room
                                   </a>
                                   <a href="{{url('view_room')}}" class="btn btn-primary btn-sm" style="border-radius: 20px; padding: 10px 20px; font-weight: 600; box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);">
                                        <i class="icon-grid"></i> View Rooms
                                   </a>
                              </div>
                         </div>
                    </div>
               </div>
               <section class="no-padding-top no-padding-bottom" style="margin-bottom: 30px;">
                    <div class="container-fluid">
                         <div class="row" style="gap: 20px 0;">
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-home" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Total Rooms</strong>
                                             </div>
                                             <div class="number dashtext-1" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['total_rooms'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: 100%; border-radius: 10px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-check" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Available Rooms</strong>
                                             </div>
                                             <div class="number dashtext-2" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['available_rooms'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: {{ $stats['total_rooms'] > 0 ? ($stats['available_rooms'] / $stats['total_rooms']) * 100 : 0 }}%; border-radius: 10px;" aria-valuenow="{{ $stats['available_rooms'] ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $stats['total_rooms'] ?? 1 }}" class="progress-bar progress-bar-template dashbg-2"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-user-1" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Occupied Rooms</strong>
                                             </div>
                                             <div class="number dashtext-3" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['occupied_rooms'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: {{ $stats['total_rooms'] > 0 ? ($stats['occupied_rooms'] / $stats['total_rooms']) * 100 : 0 }}%; border-radius: 10px;" aria-valuenow="{{ $stats['occupied_rooms'] ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $stats['total_rooms'] ?? 1 }}" class="progress-bar progress-bar-template dashbg-3"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-users" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Total Users</strong>
                                             </div>
                                             <div class="number dashtext-4" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['total_users'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: 85%; border-radius: 10px;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         
                         <!-- Booking Statistics Section -->
                         <div class="row" style="gap: 20px 0; margin-top: 30px;">
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-calendar" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Total Bookings</strong>
                                             </div>
                                             <div class="number dashtext-1" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['total_bookings'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: 100%; border-radius: 10px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-clock" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Pending Bookings</strong>
                                             </div>
                                             <div class="number dashtext-2" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['pending_bookings'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: {{ $stats['total_bookings'] > 0 ? ($stats['pending_bookings'] / $stats['total_bookings']) * 100 : 0 }}%; border-radius: 10px;" aria-valuenow="{{ $stats['pending_bookings'] ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $stats['total_bookings'] ?? 1 }}" class="progress-bar progress-bar-template dashbg-2"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-check" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Approved Bookings</strong>
                                             </div>
                                             <div class="number dashtext-3" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['approved_bookings'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: {{ $stats['total_bookings'] > 0 ? ($stats['approved_bookings'] / $stats['total_bookings']) * 100 : 0 }}%; border-radius: 10px;" aria-valuenow="{{ $stats['approved_bookings'] ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $stats['total_bookings'] ?? 1 }}" class="progress-bar progress-bar-template dashbg-3"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                   <div class="statistic-block block" style="border-radius: 15px; background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease; padding: 25px;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                             <div class="title">
                                                  <div class="icon" style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 10px; display: inline-block; margin-bottom: 10px;"><i class="icon-close" style="color: white; font-size: 1.5rem;"></i></div>
                                                  <strong style="color: white; font-size: 1.1rem;">Rejected Bookings</strong>
                                             </div>
                                             <div class="number dashtext-4" style="color: white; font-size: 2.5rem; font-weight: 700;">{{ $stats['rejected_bookings'] ?? 0 }}</div>
                                        </div>
                                        <div class="progress progress-template" style="margin-top: 15px; height: 6px; border-radius: 10px;">
                                             <div role="progressbar" style="width: {{ $stats['total_bookings'] > 0 ? ($stats['rejected_bookings'] / $stats['total_bookings']) * 100 : 0 }}%; border-radius: 10px;" aria-valuenow="{{ $stats['rejected_bookings'] ?? 0 }}" aria-valuemin="0" aria-valuemax="{{ $stats['total_bookings'] ?? 1 }}" class="progress-bar progress-bar-template dashbg-4"></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         
                         <!-- Quick Actions Section -->
                         <div class="row" style="margin-top: 30px;">
                              <div class="col-12">
                                   <div class="block" style="background: #495057; padding: 20px; border-radius: 10px;">
                                        <h3 style="color: white; margin-bottom: 20px;">Quick Actions</h3>
                                        <div class="row">
                                             <div class="col-md-3 col-sm-6 mb-3">
                                                  <a href="{{ url('create_room') }}" class="btn btn-primary btn-block" style="padding: 15px;">
                                                       <i class="icon-plus"></i> Add New Room
                                                  </a>
                                             </div>
                                             <div class="col-md-3 col-sm-6 mb-3">
                                                  <a href="{{ url('view_room') }}" class="btn btn-info btn-block" style="padding: 15px;">
                                                       <i class="icon-list"></i> View All Rooms
                                                  </a>
                                             </div>
                                             <div class="col-md-3 col-sm-6 mb-3">
                                                  <a href="{{ route('admin.bookings') }}" class="btn btn-success btn-block" style="padding: 15px;">
                                                       <i class="icon-calendar"></i> View Bookings
                                                  </a>
                                             </div>
                                             <div class="col-md-3 col-sm-6 mb-3">
                                                  <button class="btn btn-warning btn-block" style="padding: 15px;">
                                                       <i class="icon-cog"></i> Hotel Settings
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         
                         <!-- Recent Rooms Section -->
                         @if(isset($stats['recent_rooms']) && $stats['recent_rooms']->count() > 0)
                         <div class="row" style="margin-top: 30px;">
                              <div class="col-12">
                                   <div class="block" style="background: #495057; padding: 20px; border-radius: 10px;">
                                        <h3 style="color: white; margin-bottom: 20px;">Recently Added Rooms</h3>
                                        <div class="table-responsive">
                                             <table class="table table-dark">
                                                  <thead>
                                                       <tr>
                                                            <th>Room Title</th>
                                                            <th>Type</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                            <th>Added</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach($stats['recent_rooms'] as $room)
                                                       <tr>
                                                            <td>{{ $room->room_title }}</td>
                                                            <td>{{ ucfirst($room->room_type) }}</td>
                                                            <td>${{ number_format($room->price, 2) }}</td>
                                                            <td>
                                                                 <span class="badge {{ $room->status == 'available' ? 'badge-success' : ($room->status == 'occupied' ? 'badge-danger' : 'badge-warning') }}">
                                                                      {{ ucfirst($room->status) }}
                                                                 </span>
                                                            </td>
                                                            <td>{{ $room->created_at->diffForHumans() }}</td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @endif
                         
                         <!-- Recent Bookings Section -->
                         @if(isset($stats['recent_bookings']) && $stats['recent_bookings']->count() > 0)
                         <div class="row" style="margin-top: 30px;">
                              <div class="col-12">
                                   <div class="block" style="background: #495057; padding: 20px; border-radius: 10px;">
                                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                             <h3 style="color: white; margin: 0;">Recent Bookings</h3>
                                             <a href="{{ route('admin.bookings') }}" class="btn btn-primary btn-sm" style="border-radius: 20px; padding: 8px 20px;">
                                                  <i class="icon-calendar"></i> View All Bookings
                                             </a>
                                        </div>
                                        <div class="table-responsive">
                                             <table class="table table-dark">
                                                  <thead>
                                                       <tr>
                                                            <th>Guest Name</th>
                                                            <th>Room</th>
                                                            <th>Check-in</th>
                                                            <th>Check-out</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Booked</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach($stats['recent_bookings'] as $booking)
                                                       <tr>
                                                            <td>{{ $booking->guest_name }}</td>
                                                            <td>{{ $booking->room->room_title ?? 'N/A' }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</td>
                                                            <td>
                                                                 <span class="badge {{ $booking->status == 'approved' ? 'badge-success' : ($booking->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                                      {{ ucfirst($booking->status) }}
                                                                 </span>
                                                            </td>
                                                            <td>${{ number_format($booking->total_price, 2) }}</td>
                                                            <td>{{ $booking->created_at->diffForHumans() }}</td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @endif
                    </div>
               </section>
                                   <div class="bar-chart block no-margin-bottom">
                                        <canvas id="barChartExample1"></canvas>
                                   </div>
                                   <div class="bar-chart block">
                                        <canvas id="barChartExample2"></canvas>
                                   </div>
                              </div>
                              <div class="col-lg-8">
                                   <div class="line-cahrt block">
                                        <canvas id="lineCahrt"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>
               <section class="no-padding-bottom">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-lg-6">
                                   <div class="stats-2-block block d-flex">
                                        <div class="stats-2 d-flex">
                                             <div class="stats-2-arrow low"><i class="fa fa-caret-down"></i></div>
                                             <div class="stats-2-content"><strong class="d-block">5.657</strong><span class="d-block">Standard Scans</span>
                                                  <div class="progress progress-template progress-small">
                                                       <div role="progressbar" style="width: 60%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-2"></div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="stats-2 d-flex">
                                             <div class="stats-2-arrow height"><i class="fa fa-caret-up"></i></div>
                                             <div class="stats-2-content"><strong class="d-block">3.1459</strong><span class="d-block">Team Scans</span>
                                                  <div class="progress progress-template progress-small">
                                                       <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-3"></div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="stats-3-block block d-flex">
                                        <div class="stats-3"><strong class="d-block">745</strong><span class="d-block">Total requests</span>
                                             <div class="progress progress-template progress-small">
                                                  <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-1"></div>
                                             </div>
                                        </div>
                                        <div class="stats-3 d-flex justify-content-between text-center">
                                             <div class="item"><strong class="d-block strong-sm">4.124</strong><span class="d-block span-sm">Threats</span>
                                                  <div class="line"></div><small>+246</small>
                                             </div>
                                             <div class="item"><strong class="d-block strong-sm">2.147</strong><span class="d-block span-sm">Neutral</span>
                                                  <div class="line"></div><small>+416</small>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="drills-chart block">
                                        <canvas id="lineChart1"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>
               <section class="no-padding-bottom">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-lg-4">
                                   <div class="user-block block text-center">
                                        <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                             <div class="order dashbg-2">1st</div>
                                        </div><a href="#" class="user-title">
                                             <h3 class="h5">Richard Nevoreski</h3><span>@richardnevo</span>
                                        </a>
                                        <div class="contributions">950 Contributions</div>
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>340</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>460</strong></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="user-block block text-center">
                                        <div class="avatar"><img src="img/avatar-4.jpg" alt="..." class="img-fluid">
                                             <div class="order dashbg-1">2nd</div>
                                        </div><a href="#" class="user-title">
                                             <h3 class="h5">Samuel Watson</h3><span>@samwatson</span>
                                        </a>
                                        <div class="contributions">772 Contributions</div>
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>80</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>420</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>272</strong></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="user-block block text-center">
                                        <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid">
                                             <div class="order dashbg-4">3rd</div>
                                        </div><a href="#" class="user-title">
                                             <h3 class="h5">Sebastian Wood</h3><span>@sebastian</span>
                                        </a>
                                        <div class="contributions">620 Contributions</div>
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>280</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>190</strong></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="public-user-block block">
                              <div class="row d-flex align-items-center">
                                   <div class="col-lg-4 d-flex align-items-center">
                                        <div class="order">4th</div>
                                        <div class="avatar"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Tomas Hecktor</strong><span class="d-block">@tomhecktor</span></a>
                                   </div>
                                   <div class="col-lg-4 text-center">
                                        <div class="contributions">410 Contributions</div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>110</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>200</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>100</strong></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="public-user-block block">
                              <div class="row d-flex align-items-center">
                                   <div class="col-lg-4 d-flex align-items-center">
                                        <div class="order">5th</div>
                                        <div class="avatar"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Alexander Shelby</strong><span class="d-block">@alexshelby</span></a>
                                   </div>
                                   <div class="col-lg-4 text-center">
                                        <div class="contributions">320 Contributions</div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>120</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>50</strong></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="public-user-block block">
                              <div class="row d-flex align-items-center">
                                   <div class="col-lg-4 d-flex align-items-center">
                                        <div class="order">6th</div>
                                        <div class="avatar"> <img src="img/avatar-6.jpg" alt="..." class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Arther Kooper</strong><span class="d-block">@artherkooper</span></a>
                                   </div>
                                   <div class="col-lg-4 text-center">
                                        <div class="contributions">170 Contributions</div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="details d-flex">
                                             <div class="item"><i class="icon-info"></i><strong>60</strong></div>
                                             <div class="item"><i class="fa fa-gg"></i><strong>70</strong></div>
                                             <div class="item"><i class="icon-flow-branch"></i><strong>40</strong></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>
               <section class="margin-bottom-sm">
                    <div class="container-fluid">
                         <div class="row d-flex align-items-stretch">
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-1 block">
                                        <div class="title"> <strong class="d-block">Sales Difference</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="row d-flex align-items-end justify-content-between">
                                             <div class="col-5">
                                                  <div class="text"><strong class="d-block dashtext-3">$740</strong><span class="d-block">May 2017</span><small class="d-block">320 Sales</small></div>
                                             </div>
                                             <div class="col-7">
                                                  <div class="bar-chart chart">
                                                       <canvas id="salesBarChart1"></canvas>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-1 block">
                                        <div class="title"> <strong class="d-block">Visit Statistics</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="row d-flex align-items-end justify-content-between">
                                             <div class="col-4">
                                                  <div class="text"><strong class="d-block dashtext-1">$457</strong><span class="d-block">May 2017</span><small class="d-block">210 Sales</small></div>
                                             </div>
                                             <div class="col-8">
                                                  <div class="bar-chart chart">
                                                       <canvas id="visitPieChart"></canvas>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-1 block">
                                        <div class="title"> <strong class="d-block">Sales Activities</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="row d-flex align-items-end justify-content-between">
                                             <div class="col-5">
                                                  <div class="text"><strong class="d-block dashtext-2">80%</strong><span class="d-block">May 2017</span><small class="d-block">+35 Sales</small></div>
                                             </div>
                                             <div class="col-7">
                                                  <div class="bar-chart chart">
                                                       <canvas id="salesBarChart2"></canvas>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>
               <section class="no-padding-bottom">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-lg-6">
                                   <div class="checklist-block block">
                                        <div class="title"><strong>To Do List</strong></div>
                                        <div class="checklist">
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                                                  <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-2" name="input-2" checked class="checkbox-template">
                                                  <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                                                  <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                                                  <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                                                  <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                             <div class="item d-flex align-items-center">
                                                  <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                                                  <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="messages-block block">
                                        <div class="title"><strong>New Messages</strong></div>
                                        <div class="messages"><a href="#" class="message d-flex align-items-center">
                                                  <div class="profile"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                       <div class="status online"></div>
                                                  </div>
                                                  <div class="content"> <strong class="d-block">Nadia Halsey</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">9:30am</small></div>
                                             </a><a href="#" class="message d-flex align-items-center">
                                                  <div class="profile"><img src="img/avatar-2.jpg" alt="..." class="img-fluid">
                                                       <div class="status away"></div>
                                                  </div>
                                                  <div class="content"> <strong class="d-block">Peter Ramsy</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">7:40am</small></div>
                                             </a><a href="#" class="message d-flex align-items-center">
                                                  <div class="profile"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                       <div class="status busy"></div>
                                                  </div>
                                                  <div class="content"> <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div>
                                             </a><a href="#" class="message d-flex align-items-center">
                                                  <div class="profile"><img src="img/avatar-5.jpg" alt="..." class="img-fluid">
                                                       <div class="status offline"></div>
                                                  </div>
                                                  <div class="content"> <strong class="d-block">Sara Wood</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div>
                                             </a><a href="#" class="message d-flex align-items-center">
                                                  <div class="profile"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                       <div class="status online"></div>
                                                  </div>
                                                  <div class="content"> <strong class="d-block">Nader Magdy</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">9:47pm</small></div>
                                             </a></div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>
               <section>
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-2 block">
                                        <div class="title"><strong class="d-block">Credit Sales</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="piechart chart">
                                             <canvas id="pieChartHome1"></canvas>
                                             <div class="text"><strong class="d-block">$2.145</strong><span class="d-block">Sales</span></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-2 block">
                                        <div class="title"><strong class="d-block">Channel Sales</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="piechart chart">
                                             <canvas id="pieChartHome2"></canvas>
                                             <div class="text"><strong class="d-block">$7.784</strong><span class="d-block">Sales</span></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-4">
                                   <div class="stats-with-chart-2 block">
                                        <div class="title"><strong class="d-block">Direct Sales</strong><span class="d-block">Lorem ipsum dolor sit</span></div>
                                        <div class="piechart chart">
                                             <canvas id="pieChartHome3"></canvas>
                                             <div class="text"><strong class="d-block">$4.957</strong><span class="d-block">Sales</span></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>