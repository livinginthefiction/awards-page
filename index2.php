<?php include('components/header.php'); ?>

<style type="text/css">
  /* NEED TO FIX ACTIVE CROPPED BULLET - OVERFLOW HIDDEN ISSUE */ 
/*body {
  background: #f5f7fa;
  margin-top: 30px;
}*/
.loading-bar__wrapper {
  background: #fff;
  border-radius: 5px;
  padding: 60px 60px 30px;
  box-shadow: 0 8px 10px rgba(223, 230, 241, 0.5);
  z-index: 99;
}
.loading-bar__wrapper label {
  display: block;
  font-size: 0.9rem;
  margin-bottom: 12px;
  font-style: italic;
  font-weight: bold;
  color: #00ffa4;
}
.loading-bar {
  background: #00ffa4;
  height: 8px;
  border-radius: 100px;
  justify-content: space-around;
}
.loading-bar-bullet::before {
  content: "";
  display: block;
  background: #445058;
  height: 16px;
  width: 16px;
  border-radius: 100px;
  z-index: 999;
  margin-top: -4px;
  border: 5px solid white;
  cursor: pointer;
}
.slick-current.loading-bar-bullet::before {
  height: 18px;
  width: 18px;
  margin-top: -3px;
  margin-left: -9px; /* Center bullet - Half .slick-current width*/
  border: 3px solid white;
}
.labels {
  margin-top: 50px;
  text-align: center;
}

/* Arrows */
.slick-prev,
.slick-next {
  font-size: 0;
  line-height: 0;
  position: absolute;
  top: 50%;
  display: block;
  width: 20px;
  height: 32px;
  padding: 0;
  -webkit-transform: translate(0, -50%);
  -ms-transform: translate(0, -50%);
  transform: translate(0, -50%);
  cursor: pointer;
  color: transparent;
  border: none;
  outline: none;
  background: transparent;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus {
  color: transparent;
  outline: none;
  background: transparent;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before {
  opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before {
  opacity: 0.25;
}
.slick-prev:before,
.slick-next:before {
  font-size: 32px;
  line-height: 1;
  opacity: 0.75;
  color: #000000;
  font-family: slick;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.slick-prev {
  left: -40px;
}
.slick-prev:before {
    content: '←';
}
.slick-next {
  right: -40px;
}
.slick-next:before {
    content: '→';
}

.qb-button {
  display: inline-block;
  background: #00ffa4;
  border-radius: 100px;
  padding: 5px 15px;
  margin-bottom: 15px;
  color: #445058;
  font-size: 0.9rem;
  font-weight: bold;
  cursor: pointer;
}
.qb-button:hover {
  color: #000;
}
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  /*max-width: 1000px;*/
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php // include('components/sidebar.php'); ?>
        
     <div class="main-panel w-100">        
        <div class="content-wrapper py-1">
          <div class="row">

            <!-- timeline start -->
            <div class="row"> 
  <div class="small-12 column">
    <div class="loading-bar__wrapper">
      <div class="loading-bar">
        <div class="loading-bar-bullet">Others</div>
        <?php 
          include 'admin/dbConfig.php';
          $years = array(); 
          $sql0 = mysqli_query($db, "SELECT DISTINCT(`year`) as year FROM `awards` WHERE status=1 AND year IS NOT NULL ORDER BY `year` DESC");
          while ($row0 = mysqli_fetch_assoc($sql0)){ array_push($years, $row0['year']); ?>
          <!-- <li class='swiper-pagination-switch'><span class='switch-title'></span></li> -->
            <div class="loading-bar-bullet"><?= $row0['year'] ?></div>
        <?php } ?>
        
      </div>
      
      <div class="labels">
        <div>

          <!-- <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="http://localhost/alyousuf/upload/61c4552cc5f3d_0M6A0598.jpg" style="width:100%">
              <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="http://localhost/alyousuf/upload/61c45ed0bca0c_0M6A0628.jpg" style="width:100%">
              <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="http://localhost/alyousuf/upload/61c462b00717c_0M6A0661.jpg" style="width:100%">
              <div class="text">Caption Three</div>
            </div>


            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
          <br> 

          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div> -->
          
          <!-- start swiper  -->
           <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php 
                  include 'admin/dbConfig.php';
                  $sql2 = mysqli_query($db, "SELECT * FROM awards WHERE status=1 AND year IS NULL");
                  while ($row2 = mysqli_fetch_assoc($sql2)){ ?>
                    <div class="swiper-slide">
                    <a href="award-detail.php?id=<?= $row2['id'] ?>">
                      <div class="card mx-2">
                        <img loading="lazy" style="max-height: 300px;min-height: 300px;object-fit: contain;" src="<?= json_decode($row2['image'])[0] ?>" class="card-img-top" alt="<?= json_decode($row2['image'])[0] ?>">
                        <div class="card-body p-0 my-2">
                          <h5 class="card-title m-0 text-center"><?= $row2['name'] ?></h5>
                        </div>
                      </div>
                    </a>
                    </div>
                  <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <!-- end swiper  -->

                  </div>
        <?php 
          foreach ($years as $year) { ?>
            <div>
              <div class="swiper mySwiper<?= $year ?>">
                <div class="swiper-wrapper">
                  <?php 
                    $sql2 = mysqli_query($db, "SELECT * FROM awards WHERE status=1 AND year='".$year."'");
                    while ($row2 = mysqli_fetch_assoc($sql2)){ ?>
                      <div class="swiper-slide">
                        <a href="award-detail.php?id=<?= $row2['id'] ?>">
                          <div class="card mx-2">
                            <img loading="lazy" style="max-height: 300px;min-height: 300px;object-fit: contain;" src="<?= json_decode($row2['image'])[0] ?>" class="card-img-top" alt="<?= json_decode($row2['image'])[0] ?>">
                            <div class="card-body p-0 my-2">
                              <h5 class="card-title m-0 text-center"><?= $row2['name'] ?></h5>
                            </div>
                          </div>
                        </a>
                      </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
            <?php } ?>


        
                 
                </div>
                
              </div>
            </div>
          </div>
            <!-- timeline end -->
          </div>
        </div>
    
        
     
      </div>
    </div>

  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".loading-bar").slick({ 
        centerMode: true,
        // centerPadding: "80px",
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 3,
        focusOnSelect: true,
        asNavFor: ".labels",
        responsive: [
          
          {
            breakpoint: 430,
            settings: {slidesToShow: 2,slidesToScroll: 1}
          }
        ]
      });

      $(".labels").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        draggable: false,
        asNavFor: ".loading-bar"
      });

      // $('.slick-slider').slick();

       

     <?php foreach ($years as $value) { ?>
        var swiper = new Swiper(".mySwiper<?= $value ?>", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        breakpoints: {
          425: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
     <?php } ?>

     var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        breakpoints: {
          425: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });

    });

// var slideIndex = 1;
// showSlides(slideIndex);


// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }


//     // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

   </script>

        <?php include('components/footer.php'); ?>
</body>

</html>
