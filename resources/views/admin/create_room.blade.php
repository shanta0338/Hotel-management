<!DOCTYPE html>
<html>

<head>
     @include('admin.css')
     <style type="text/css">
          label {
               display: inline-block;
               width: 200px;
          }

          .div_deg {
               padding-top: 30px;
          }

          .div_center {
               text-align: center;
               padding-top: 30px;
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
                         <h1 style="font-size: 30px; font-weight: bold;">Add Room</h1>
                         
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

                         <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="div_deg">
                                   <label>Room title</label>
                                   <input type="text" name="title">
                              </div>

                              <div class="div_deg">
                                   <label>Description</label>
                                   <textarea name="description"></textarea>
                              </div>

                              <div class="div_deg">
                                   <label>Price</label>
                                   <input type="number" name="price">
                              </div>

                              <div class="div_deg">
                                   <label>Room Type</label> 
                                   <select name="room_type">
                                        <option selected value="regular">Regular</option>
                                        <option value="premium">Premium</option>
                                        <option value="deluxe">Deluxe</option>
                                   </select>
                              </div>

                              <div class="div_deg">
                                   <label>Capacity (Number of Guests)</label>
                                   <input type="number" name="capacity" min="1" max="10" required>
                              </div>

                              <div class="div_deg">
                                   <label>Free Wi-Fi</label>
                                   <select name="wifi">
                                        <option selected value="yes">Yes</option>
                                        <option value="no">No</option>
                                   </select>
                              </div>

                              <div class="div_deg">
                                   <label>Image</label>
                                   <input type="file" name="image">
                              </div>

                              <div class="div_deg">
                                   <input class="btn btn-primary" type="submit" value="Add Room">
                              </div>

                         </form>
                    </div>

               </div>
          </div>
     </div>

     @include('admin.footer')
</body>

</html>