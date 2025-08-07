<div class="gallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Gallery</h2>
               @if(isset($user) && $user)
                  <p>Explore our beautiful hotel facilities, {{ $user->name }}!</p>
               @else
                  <p>Discover the elegance and luxury that awaits you</p>
               @endif
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery1.jpg" alt="Hotel Lobby"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery2.jpg" alt="Hotel Restaurant"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery3.jpg" alt="Hotel Pool"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery4.jpg" alt="Hotel Spa"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery5.jpg" alt="Hotel Fitness"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery6.jpg" alt="Hotel Business Center"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery7.jpg" alt="Hotel Conference Room"/></figure>
            </div>
         </div>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure><img src="images/gallery8.jpg" alt="Hotel Exterior"/></figure>
            </div>
         </div>
      </div>
   </div>
</div>
