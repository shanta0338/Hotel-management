<!DOCTYPE html>
<html>
<head>
     @include('admin.css')
     <style type="text/css">
          .gallery-container {
               padding: 20px;
          }

          .add-button {
               display: inline-block;
               background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 100%);
               color: white;
               padding: 12px 25px;
               border-radius: 8px;
               text-decoration: none;
               font-weight: bold;
               margin-bottom: 30px;
               transition: all 0.3s ease;
          }

          .add-button:hover {
               transform: translateY(-2px);
               box-shadow: 0 5px 15px rgba(56, 189, 248, 0.4);
               color: white;
               text-decoration: none;
          }

          .gallery-grid {
               display: grid;
               grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
               gap: 20px;
               margin-top: 20px;
          }

          .gallery-item {
               background: rgba(255, 255, 255, 0.1);
               border-radius: 15px;
               overflow: hidden;
               backdrop-filter: blur(10px);
               box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
               transition: all 0.3s ease;
          }

          .gallery-item:hover {
               transform: translateY(-5px);
               box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
          }

          .gallery-image {
               width: 100%;
               height: 200px;
               object-fit: cover;
               display: block;
          }

          .gallery-info {
               padding: 15px;
               color: white;
          }

          .gallery-title {
               font-size: 1.2rem;
               font-weight: bold;
               margin-bottom: 5px;
          }

          .gallery-description {
               font-size: 0.9rem;
               color: rgba(255, 255, 255, 0.8);
               margin-bottom: 15px;
               line-height: 1.4;
          }

          .gallery-actions {
               display: flex;
               gap: 10px;
          }

          .btn {
               padding: 8px 15px;
               border-radius: 5px;
               text-decoration: none;
               font-weight: bold;
               font-size: 14px;
               transition: all 0.3s ease;
               border: none;
               cursor: pointer;
          }

          .btn-danger {
               background: #ef4444;
               color: white;
          }

          .btn-danger:hover {
               background: #dc2626;
               transform: scale(1.05);
               color: white;
               text-decoration: none;
          }

          .empty-state {
               text-align: center;
               color: white;
               padding: 100px 20px;
          }

          .empty-state h3 {
               font-size: 2rem;
               margin-bottom: 10px;
          }

          .empty-state p {
               font-size: 1.1rem;
               color: rgba(255, 255, 255, 0.8);
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

                    <div class="gallery-container">
                         <h1 style="text-align: center; color: white; margin-bottom: 30px; font-size: 2.5rem;">Gallery Management</h1>
                         
                         <div style="text-align: center;">
                              <a href="{{ route('add_gallery') }}" class="add-button">+ Add New Image</a>
                         </div>

                         @if($galleries && $galleries->count() > 0)
                         <div class="gallery-grid">
                              @foreach($galleries as $gallery)
                              <div class="gallery-item">
                                   <img src="{{ asset('gallery_images/' . $gallery->image) }}" 
                                        alt="{{ $gallery->title }}" 
                                        class="gallery-image">
                                   
                                   <div class="gallery-info">
                                        <div class="gallery-title">{{ $gallery->title }}</div>
                                        
                                        @if($gallery->description)
                                        <div class="gallery-description">{{ $gallery->description }}</div>
                                        @endif
                                        
                                        <div class="gallery-actions">
                                             <a href="{{ route('delete_gallery', $gallery->id) }}" 
                                                class="btn btn-danger"
                                                onclick="return confirm('Delete this image permanently?')">
                                                Delete
                                             </a>
                                        </div>
                                   </div>
                              </div>
                              @endforeach
                         </div>
                         @else
                         <div class="empty-state">
                              <h3>No images in gallery</h3>
                              <p>Upload your first image to get started</p>
                         </div>
                         @endif

                    </div>

               </div>
          </div>
     </div>

     @include('admin.footer')
</body>
</html>
