<div class="blog">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Blog</h2>
               @if(isset($user) && $user)
                  <p>Discover insights and tips, {{ $user->name }}!</p>
               @else
                  <p>Stay updated with hospitality insights and travel tips</p>
               @endif
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
            <div class="blog_box">
               <div class="blog_img">
                  <figure><img src="images/blog1.jpg" alt="#"/></figure>
               </div>
               <div class="blog_room">
                  <h3>Modern Room Design</h3>
                  <span>Hotel Design</span>
                  <p>Discover the latest trends in luxury hotel room design, from minimalist aesthetics to smart technology integration that enhances guest experience.</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="blog_box">
               <div class="blog_img">
                  <figure><img src="images/blog2.jpg" alt="#"/></figure>
               </div>
               <div class="blog_room">
                  <h3>Guest Services Excellence</h3>
                  <span>Customer Service</span>
                  <p>Learn how our dedicated staff creates memorable experiences through personalized service and attention to detail that exceeds expectations.</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="blog_box">
               <div class="blog_img">
                  <figure><img src="images/blog3.jpg" alt="#"/></figure>
               </div>
               <div class="blog_room">
                  <h3>Sustainable Practices</h3>
                  <span>Sustainability</span>
                  <p>Explore our commitment to environmental responsibility through eco-friendly practices while maintaining luxury standards for our guests.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
