<section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>

<style>
/* Home Page Banner Alignment Fix */
.banner_main {
   margin-top: 0 !important;
   position: relative !important;
   z-index: 1 !important;
}

.banner {
   position: relative !important;
   z-index: 1 !important;
}

.carousel-inner {
   position: relative !important;
   z-index: 1 !important;
}

.carousel-item {
   position: relative !important;
   height: auto !important;
   min-height: 500px !important;
}

.carousel-item img {
   width: 100% !important;
   height: auto !important;
   min-height: 500px !important;
   object-fit: cover !important;
   object-position: center !important;
   display: block !important;
}

/* Ensure proper spacing from header */
.linear-header + .banner_main {
   margin-top: 0 !important;
   padding-top: 0 !important;
}

/* Carousel controls positioning */
.carousel-control-prev,
.carousel-control-next {
   z-index: 5 !important;
   width: 5% !important;
   color: #fff !important;
   text-align: center !important;
   opacity: 0.8 !important;
   transition: opacity 0.3s ease !important;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
   opacity: 1 !important;
   color: #fff !important;
}

/* Carousel indicators styling */
.carousel-indicators {
   bottom: 20px !important;
   z-index: 15 !important;
}

.carousel-indicators li {
   background-color: rgba(255, 255, 255, 0.5) !important;
   border: 1px solid #fff !important;
   width: 12px !important;
   height: 12px !important;
   border-radius: 50% !important;
   margin: 0 5px !important;
   transition: all 0.3s ease !important;
}

.carousel-indicators .active {
   background-color: #fe0000 !important;
   border-color: #fe0000 !important;
   transform: scale(1.2) !important;
}

/* Mobile responsiveness for banner */
@media (max-width: 768px) {
   .carousel-item {
      min-height: 300px !important;
   }
   
   .carousel-item img {
      min-height: 300px !important;
   }
   
   .carousel-control-prev,
   .carousel-control-next {
      width: 10% !important;
   }
}

@media (max-width: 576px) {
   .carousel-item {
      min-height: 250px !important;
   }
   
   .carousel-item img {
      min-height: 250px !important;
   }
}
</style>