<!DOCTYPE html>
<html>

<head>
     @include('admin.css')
     <style type="text/css">
          label {
               display: inline-block;
               width: 200px;
               color: white;
               font-weight: bold;
          }

          .div_deg {
               padding-top: 30px;
          }

          .div_center {
               text-align: center;
               padding-top: 30px;
          }

          .form-control {
               width: 300px;
               height: 40px;
               padding: 8px;
               border: 1px solid #ccc;
               border-radius: 5px;
          }

          textarea.form-control {
               height: 80px;
               resize: vertical;
          }

          .current-image {
               margin-top: 10px;
               border-radius: 8px;
               box-shadow: 0 2px 8px rgba(0,0,0,0.1);
          }

          .btn-container {
               padding-top: 40px;
          }

          .btn-container .btn {
               margin: 0 10px;
               padding: 12px 30px;
               border-radius: 5px;
               text-decoration: none;
               font-weight: bold;
          }
     </style>
</head>

<body>
     @include('admin.header')

     @include('admin.sidebar')

     <div class="page-content">
          <div class="page-header">
               <div class="container-fluid">

                    <div class="div_center">
                         <h1 style="font-size: 30px; font-weight: bold; color: white;">Edit Room</h1>
                         
                         @if(session('message'))
                         <div class="alert alert-success" style="color: green; padding: 10px; margin: 10px 0;">
                              {{ session('message') }}
                         </div>
                         @endif

                         @if ($errors->any())
                         <div class="alert alert-danger" style="color: red; padding: 10px; margin: 10px 0;">
                              <ul>
                                   @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                   @endforeach
                              </ul>
                         </div>
                         @endif

                         <form action="{{ url('update_room', $room->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              
                              <div class="div_deg">
                                   <label>Room Title</label>
                                   <input type="text" name="title" class="form-control" value="{{ $room->room_title }}" required>
                              </div>

                              <div class="div_deg">
                                   <label>Description</label>
                                   <textarea name="description" class="form-control">{{ $room->description }}</textarea>
                              </div>

                              <div class="div_deg">
                                   <label>Price ($)</label>
                                   <input type="number" name="price" class="form-control" step="0.01" value="{{ $room->price }}" required>
                              </div>

                              <div class="div_deg">
                                   <label>Room Type</label> 
                                   <select name="room_type" class="form-control" required>
                                        <option value="regular" {{ $room->room_type == 'regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="premium" {{ $room->room_type == 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="deluxe" {{ $room->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                                   </select>
                              </div>

                              <div class="div_deg">
                                   <label>Capacity (Number of Guests)</label>
                                   <input type="number" name="capacity" class="form-control" min="1" max="10" value="{{ $room->capacity }}" required>
                              </div>

                              <div class="div_deg">
                                   <label>Free Wi-Fi</label>
                                   <select name="wifi" class="form-control" required>
                                        <option value="yes" {{ $room->wifi ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ !$room->wifi ? 'selected' : '' }}>No</option>
                                   </select>
                              </div>

                              <div class="div_deg">
                                   <label>Status</label>
                                   <select name="status" class="form-control" required>
                                        <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                                        <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                   </select>
                              </div>

                              <div class="div_deg">
                                   <label>Current Image</label>
                                   <div>
                                        @if($room->image)
                                             <img src="{{ asset('room_images/' . $room->image) }}" 
                                                  width="150" height="150" 
                                                  alt="Current room image"
                                                  class="current-image"
                                                  style="object-fit: cover;">
                                             <p style="color: white; margin-top: 10px;">Current: {{ $room->image }}</p>
                                        @else
                                             <p style="color: #999;">No image uploaded</p>
                                        @endif
                                   </div>
                              </div>

                              <div class="div_deg">
                                   <label>New Image (Optional)</label>
                                   <input type="file" name="image" class="form-control">
                                   <small style="color: #ccc;">Leave empty to keep current image</small>
                              </div>

                              <div class="btn-container">
                                   <input class="btn btn-success" type="submit" value="Update Room">
                                   <a href="{{ route('view_room') }}" class="btn btn-secondary">Cancel</a>
                              </div>

                         </form>
                    </div>

               </div>
          </div>
     </div>

     @include('admin.footer')
</body>

</html>
