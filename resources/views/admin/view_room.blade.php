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
               box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
               border-radius: 12px;
               overflow: hidden;
               background: #f8fafc;
          }

          .table_deg th,
          .table_deg td {
               text-align: center;
               padding: 15px;
          }

          .th_deg {
               background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 100%);
               color: #fff;
               font-weight: bold;
               border-bottom: 2px solid #0ea5e9;
          }

          .table_deg tr {
               transition: background 0.2s;
          }

          .table_deg tr:nth-child(even) {
               background-color: #e0f2fe;
          }

          .table_deg tr:hover {
               background-color: #bae6fd;
          }

          .table_deg td {
               border-bottom: 1px solid #e0e7ef;
               vertical-align: middle;
          }

          .table_deg img {
               border-radius: 8px;
               box-shadow: 0 1px 4px rgba(0, 0, 0, 0.10);
          }

          /* Action buttons styling */
          .action-btn {
               padding: 3px 8px !important;
               font-size: 11px !important;
               margin: 1px !important;
               border-radius: 3px !important;
               text-decoration: none;
               display: inline-block;
               min-width: 45px;
               text-align: center;
               line-height: 1.2;
          }

          .action-btn:hover {
               transform: scale(1.05);
               transition: all 0.2s ease;
          }
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

                    <h1 style="text-align: center; color: white; padding-bottom: 20px;">All Rooms</h1>

                    <!-- Room Statistics -->
                    <div style="display: flex; justify-content: space-around; margin-bottom: 30px; flex-wrap: wrap;">
                         <div style="background: #28a745; color: white; padding: 15px; border-radius: 8px; text-align: center; min-width: 150px; margin: 5px;">
                              <h3>{{ $stats['total_rooms'] }}</h3>
                              <p>Total Rooms</p>
                         </div>
                         <div style="background: #17a2b8; color: white; padding: 15px; border-radius: 8px; text-align: center; min-width: 150px; margin: 5px;">
                              <h3>{{ $stats['available_rooms'] }}</h3>
                              <p>Available</p>
                         </div>
                         <div style="background: #dc3545; color: white; padding: 15px; border-radius: 8px; text-align: center; min-width: 150px; margin: 5px;">
                              <h3>{{ $stats['occupied_rooms'] }}</h3>
                              <p>Occupied</p>
                         </div>
                         <div style="background: #ffc107; color: black; padding: 15px; border-radius: 8px; text-align: center; min-width: 150px; margin: 5px;">
                              <h3>{{ $stats['total_capacity'] }}</h3>
                              <p>Total Capacity</p>
                         </div>
                         <div style="background: #6f42c1; color: white; padding: 15px; border-radius: 8px; text-align: center; min-width: 150px; margin: 5px;">
                              <h3>${{ number_format($stats['average_price'], 2) }}</h3>
                              <p>Avg. Price</p>
                         </div>
                    </div>

                    <!-- Debug Info -->
                    @if(config('app.debug'))
                    <div style="background: #495057; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;">
                         <strong>Debug Info:</strong> Found {{ $data ? $data->count() : 0 }} rooms in database
                    </div>
                    @endif

                    @if($data && $data->count() > 0)
                    
                    <!-- Search and Filter Section -->
                    <div style="background: #495057; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                         <h4 style="color: white; margin-bottom: 15px;">Filter Rooms</h4>
                         <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                              <input type="text" id="searchRoom" placeholder="Search by title..." style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                              <select id="filterType" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                                   <option value="">All Types</option>
                                   <option value="regular">Regular</option>
                                   <option value="premium">Premium</option>
                                   <option value="deluxe">Deluxe</option>
                              </select>
                              <select id="filterStatus" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                                   <option value="">All Status</option>
                                   <option value="available">Available</option>
                                   <option value="occupied">Occupied</option>
                                   <option value="maintenance">Maintenance</option>
                              </select>
                              <button onclick="clearFilters()" style="padding: 8px 15px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Clear</button>
                         </div>
                    </div>

                    <table class="table_deg" id="roomsTable">
                         <tr>
                              <th class="th_deg">Room Title</th>
                              <th class="th_deg">Description</th>
                              <th class="th_deg">Price</th>
                              <th class="th_deg">Capacity</th>
                              <th class="th_deg">Wi-Fi</th>
                              <th class="th_deg">Room Type</th>
                              <th class="th_deg">Status</th>
                              <th class="th_deg">Image</th>
                              <th class="th_deg" style="width: 80px;">Actions</th>
                         </tr>

                         @foreach($data as $room)
                         <tr>
                              <td>{{ $room->room_title }}</td>
                              <td>{!! Str::limit($room->description, 50) !!}</td>
                              <td>${{ number_format($room->price, 2) }}</td>
                              <td>{{ $room->capacity }} {{ $room->capacity == 1 ? 'Guest' : 'Guests' }}</td>
                              <td>
                                   @if($room->wifi)
                                   <span style="color: green;">✓ Available</span>
                                   @else
                                   <span style="color: red;">✗ Not Available</span>
                                   @endif
                              </td>
                              <td>{{ ucfirst($room->room_type) }}</td>
                              <td>
                                   <span style="
                                        padding: 5px 10px; 
                                        border-radius: 15px; 
                                        color: white;
                                        background: {{ $room->status == 'available' ? '#28a745' : ($room->status == 'occupied' ? '#dc3545' : '#ffc107') }};
                                   ">
                                        {{ ucfirst($room->status) }}
                                   </span>
                              </td>
                              <td>
                                   @if($room->image)
                                   <img width="80" height="80" src="{{ asset('images/rooms/' . $room->image) }}" alt="{{ $room->room_title }}" style="object-fit: cover;">
                                   @else
                                   <span style="color: #999;">No Image</span>
                                   @endif
                              </td>
                              <td>
                                   <a href="{{ url('edit_room', $room->id) }}"
                                        class="btn btn-info btn-sm action-btn"
                                        title="Edit Room">
                                        ✏️
                                   </a>
                                   <a href="{{ url('room_delete', $room->id) }}"
                                        class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('Are you sure you want to delete this room?')"
                                        title="Delete Room">
                                        🗑️
                                   </a>
                              </td>
                         </tr>
                         @endforeach
                    </table>
                    @else
                    <div style="text-align: center; color: white; padding: 50px;">
                         <h3>No rooms found</h3>
                         <p>Start by <a href="{{ url('create_room') }}" style="color: #38bdf8;">adding your first room</a></p>
                    </div>
                    @endif






               </div>
          </div>
     </div>
     @include('admin.footer')
     
     <script>
     // Search and filter functionality
     document.getElementById('searchRoom').addEventListener('keyup', filterTable);
     document.getElementById('filterType').addEventListener('change', filterTable);
     document.getElementById('filterStatus').addEventListener('change', filterTable);

     function filterTable() {
          const searchValue = document.getElementById('searchRoom').value.toLowerCase();
          const typeFilter = document.getElementById('filterType').value.toLowerCase();
          const statusFilter = document.getElementById('filterStatus').value.toLowerCase();
          const table = document.getElementById('roomsTable');
          const rows = table.getElementsByTagName('tr');

          for (let i = 1; i < rows.length; i++) { // Skip header row
               const row = rows[i];
               const title = row.cells[0].textContent.toLowerCase();
               const type = row.cells[5].textContent.toLowerCase();
               const status = row.cells[6].textContent.toLowerCase();

               const matchesSearch = title.includes(searchValue);
               const matchesType = typeFilter === '' || type.includes(typeFilter);
               const matchesStatus = statusFilter === '' || status.includes(statusFilter);

               if (matchesSearch && matchesType && matchesStatus) {
                    row.style.display = '';
               } else {
                    row.style.display = 'none';
               }
          }
     }

     function clearFilters() {
          document.getElementById('searchRoom').value = '';
          document.getElementById('filterType').value = '';
          document.getElementById('filterStatus').value = '';
          filterTable();
     }
     </script>
</body>

</html>