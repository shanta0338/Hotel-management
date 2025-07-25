<!DOCTYPE html>
<html>
<head>
     @include('admin.css')
     <style type="text/css">
          .form-container {
               max-width: 600px;
               margin: 40px auto;
               background: rgba(255, 255, 255, 0.1);
               padding: 30px;
               border-radius: 15px;
               backdrop-filter: blur(10px);
               box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
          }

          .form-container h1 {
               text-align: center;
               color: white;
               margin-bottom: 30px;
               font-size: 2.5rem;
          }

          .form-group {
               margin-bottom: 20px;
          }

          .form-group label {
               display: block;
               color: white;
               font-weight: bold;
               margin-bottom: 5px;
               font-size: 1.1rem;
          }

          .form-group input[type="text"],
          .form-group textarea,
          .form-group input[type="file"] {
               width: 100%;
               padding: 12px;
               border: 2px solid rgba(255, 255, 255, 0.3);
               border-radius: 8px;
               background: rgba(255, 255, 255, 0.1);
               color: white;
               font-size: 16px;
               backdrop-filter: blur(5px);
          }

          .form-group input[type="text"]::placeholder,
          .form-group textarea::placeholder {
               color: rgba(255, 255, 255, 0.7);
          }

          .form-group input[type="file"] {
               background: rgba(255, 255, 255, 0.2);
               border: 2px dashed rgba(255, 255, 255, 0.5);
          }

          .btn-submit {
               background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 100%);
               color: white;
               padding: 15px 30px;
               border: none;
               border-radius: 8px;
               font-size: 18px;
               font-weight: bold;
               cursor: pointer;
               width: 100%;
               transition: all 0.3s ease;
          }

          .btn-submit:hover {
               transform: translateY(-2px);
               box-shadow: 0 5px 15px rgba(56, 189, 248, 0.4);
          }

          .preview-container {
               margin-top: 15px;
               text-align: center;
          }

          .preview-image {
               max-width: 200px;
               max-height: 200px;
               border-radius: 8px;
               border: 2px solid rgba(255, 255, 255, 0.3);
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

                    @if($errors->any())
                    <div class="alert alert-danger" style="color: red; padding: 10px; margin: 10px 0;">
                         <ul style="margin: 0; padding-left: 20px;">
                              @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                         </ul>
                    </div>
                    @endif

                    <div class="form-container">
                         <h1>Add Gallery Image</h1>

                         <form action="{{ route('upload_gallery') }}" method="post" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group">
                                   <label for="title">Image Title</label>
                                   <input type="text" name="title" id="title" 
                                          placeholder="Enter image title" 
                                          value="{{ old('title') }}" required>
                              </div>

                              <div class="form-group">
                                   <label for="description">Description (Optional)</label>
                                   <textarea name="description" id="description" rows="3" 
                                             placeholder="Enter image description">{{ old('description') }}</textarea>
                              </div>

                              <div class="form-group">
                                   <label for="image">Select Image</label>
                                   <input type="file" name="image" id="image" 
                                          accept="image/*" required onchange="previewImage(this)">
                                   <div class="preview-container">
                                        <img id="image-preview" class="preview-image" style="display: none;">
                                   </div>
                              </div>

                              <div class="form-group">
                                   <button type="submit" class="btn-submit">Upload Image</button>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </div>

     <script>
          function previewImage(input) {
               if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                         var preview = document.getElementById('image-preview');
                         preview.src = e.target.result;
                         preview.style.display = 'block';
                    };
                    reader.readAsDataURL(input.files[0]);
               }
          }
     </script>

     @include('admin.footer')
</body>
</html>
