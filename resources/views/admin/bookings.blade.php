<!DOCTYPE html>
<html>
<head>
     @include('admin.css')
     <style type="text/css">
          .table_deg {
               width: 100%;
               border-collapse: separate;
               border-spacing: 0;
               margin: auto;
               margin-top: 40px;
               box-shadow: 0 2px 8px rgba(0,0,0,0.08);
               border-radius: 12px;
               overflow: hidden;
               background: #f8fafc;
          }

          .table_deg th, .table_deg td {
               text-align: center;
               padding: 15px;
               font-size: 14px;
          }

          .th_deg {
               background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 100%);
               color: #fff;
               font-weight: bold;
               border-bottom: 2px solid #0ea5e9;
          }

          .table_deg tr:nth-child(even) {
               background-color: #e0f2fe;
          }

          .table_deg tr:hover {
               background-color: #bae6fd;
          }

          .status-badge {
               padding: 6px 12px;
               border-radius: 20px;
               font-weight: bold;
               font-size: 12px;
               text-transform: uppercase;
          }

          .status-pending { background: #fef3c7; color: #d97706; }
          .status-approved { background: #d1fae5; color: #059669; }
          .status-rejected { background: #fee2e2; color: #dc2626; }
          .status-cancelled { background: #f3f4f6; color: #6b7280; }

          .btn {
               padding: 8px 15px;
               margin: 2px;
               border-radius: 5px;
               text-decoration: none;
               font-weight: bold;
               display: inline-block;
               transition: all 0.3s ease;
          }

          .btn-success { background: #10b981; color: white; }
          .btn-danger { background: #ef4444; color: white; }
          .btn-warning { background: #f59e0b; color: white; }

          .btn:hover { transform: scale(1.05); color: white; text-decoration: none; }
     </style>
</head>

<body>
     @include('admin.header')
     @include('admin.sidebar')

     <div class="page-content">
          <div class="page-header">
               <div class="container-fluid">

                    @if(session('message'))
                    <div class="alert alert-success" style="color: green; padding: 10px; margin: 10px 0; text-align: center;">
                         {{ session('message') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger" style="color: red; padding: 10px; margin: 10px 0; text-align: center;">
                         {{ session('error') }}
                    </div>
                    @endif

                    <h1 style="text-align: center; color: white; padding-bottom: 20px;">All Bookings</h1>

                    @if($bookings && $bookings->count() > 0)
                    <table class="table_deg">
                         <tr>
                              <th class="th_deg">Booking ID</th>
                              <th class="th_deg">Room</th>
                              <th class="th_deg">Guest Name</th>
                              <th class="th_deg">Email</th>
                              <th class="th_deg">Phone</th>
                              <th class="th_deg">Check-in</th>
                              <th class="th_deg">Check-out</th>
                              <th class="th_deg">Nights</th>
                              <th class="th_deg">Total Price</th>
                              <th class="th_deg">Status</th>
                              <th class="th_deg">Actions</th>
                         </tr>

                         @foreach($bookings as $booking)
                         <tr>
                              <td>#{{ $booking->id }}</td>
                              <td>{{ $booking->room->room_title }}</td>
                              <td>{{ $booking->guest_name }}</td>
                              <td>{{ $booking->email }}</td>
                              <td>{{ $booking->phone }}</td>
                              <td>{{ $booking->check_in->format('M d, Y') }}</td>
                              <td>{{ $booking->check_out->format('M d, Y') }}</td>
                              <td>{{ $booking->nights }}</td>
                              <td>${{ number_format($booking->total_price, 2) }}</td>
                              <td>
                                   <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                   </span>
                              </td>
                              <td>
                                   @if($booking->status === 'pending')
                                        <a href="{{ route('approve_booking', $booking->id) }}" 
                                           class="btn btn-success"
                                           onclick="return confirm('Approve this booking?')">
                                           Approve
                                        </a>
                                        <a href="{{ route('reject_booking', $booking->id) }}" 
                                           class="btn btn-warning"
                                           onclick="return confirm('Reject this booking?')">
                                           Reject
                                        </a>
                                   @endif
                                   <a href="{{ route('delete_booking', $booking->id) }}" 
                                      class="btn btn-danger"
                                      onclick="return confirm('Delete this booking permanently?')">
                                      Delete
                                   </a>
                              </td>
                         </tr>
                         @endforeach
                    </table>
                    @else
                    <div style="text-align: center; color: white; padding: 50px;">
                         <h3>No bookings found</h3>
                         <p>Bookings will appear here when customers make reservations</p>
                    </div>
                    @endif

               </div>
          </div>
     </div>

     @include('admin.footer')
</body>
</html>
