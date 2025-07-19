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
               box-shadow: 0 1px 4px rgba(0,0,0,0.10);
          }
     </style>
</head>

<body>
     @include('admin.header')
     @include('admin.sidebar')


     <div class="page-content">
          <div class="page-header">
               <div class="container-fluid">

                    <table class="table_deg">
                         <tr>
                              <th class="th_deg">Room Title</th>
                              <th class="th_deg">Description</th>
                              <th class="th_deg">Price</th>
                              <th class="th_deg">Wi-Fi</th>
                              <th class="th_deg">Room Type</th>
                              <th class="th_deg">Image</th>
                              <th class="th_deg">Delete</th>
                         </tr>

                         @foreach($data as $room)
                         <tr>
                              <td>
                                   {{ $room->room_title }}
                              </td>
                              <td>
                                   {!! Str::limit($room->description, 50) !!}
                              </td>
                              <td>
                                   {{ $room->price }}$
                              </td>
                              <td>
                                   {{ $room->wifi }}
                              </td>
                              <td>
                                   {{ $room->room_type }}
                              </td>
                              <td>
                                   <img width="100" height="100" src="{{ asset('images/rooms/' . $room->image) }}">
                              </td>
                              <td><a href="{{ url('room_delete', $room->id) }}" class="btn btn-danger">Delete</a></td>
                         </tr>
                         @endforeach
                    </table>






               </div>
          </div>
     </div>
     @include('admin.footer')
</body>

</html>