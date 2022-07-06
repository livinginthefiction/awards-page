<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php // include('components/sidebar.php'); ?>
        
     <div class="main-panel w-100">        
        <div class="content-wrapper py-1">
          <div class="row">
            
            <!-- start timeline -->
            <div class="container">
              <div class="swiper-container-wrapper swiper-container-wrapper--timeline">
                <!-- Timeline -->
                <ul class="swiper-pagination-custom">
                  <li class='swiper-pagination-switch first active'><span class='switch-title'>Others</span></li>
                  <?php 
                    include 'admin/dbConfig.php';
                    $years = array(); 
                    $sql0 = mysqli_query($db, "SELECT DISTINCT(`year`) as year FROM `awards` WHERE status=1 AND year IS NOT NULL ORDER BY `year`");
                    while ($row0 = mysqli_fetch_assoc($sql0)){ array_push($years, $row0['year']); ?>
                  <li class='swiper-pagination-switch'><span class='switch-title'><?= $row0['year'] ?></span></li>
                <?php } ?>
                </ul>
                <!-- Progressbar -->
                <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"></div>
                <!-- Swiper -->
                <div class="swiper swiper-container swiper-container--timeline">
                  <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                      <div class="slick-slider">
                      <?php 
                        $query2 = "SELECT * FROM awards WHERE status=1 AND year IS NULL";
                        $sql2 = mysqli_query($db, $query2);
                        file_put_contents('aa.txt', $query2.PHP_EOL,FILE_APPEND);
                       while ($row2 = mysqli_fetch_assoc($sql2)){ ?>
                          <a href="award-detail.php?id=<?= $row2['id'] ?>">
                            <div class="card mx-2">
                              <img loading="lazy" style="max-height: 300px;min-height: 300px;object-fit: contain;" src="<?= json_decode($row2['image'])[0] ?>" class="card-img-top" alt="<?= json_decode($row2['image'])[0] ?>">
                              <div class="card-body p-0 my-2">
                                <h5 class="card-title m-0 text-center"><?= $row2['name'] ?></h5>
                              </div>
                            </div>
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                    <?php foreach ($years as $year) { ?>
                    <div class="swiper-slide">
                      <div class="slick-slider<?= $year ?>">
                      <?php 
                        $query2 = "SELECT * FROM awards WHERE status=1 AND year='".$year."'";
                        $sql2 = mysqli_query($db, $query2);
                        file_put_contents('aa.txt', $query2.PHP_EOL,FILE_APPEND);
                        while ($row2 = mysqli_fetch_assoc($sql2)){ ?>
                          <a href="award-detail.php?id=<?= $row2['id'] ?>">
                            <div class="card mx-2">
                              <img loading="lazy" style="max-height: 300px;min-height: 300px;object-fit: contain;" src="<?= json_decode($row2['image'])[0] ?>" class="card-img-top" alt="<?= json_decode($row2['image'])[0] ?>">
                              <div class="card-body p-0 my-2">
                                <h5 class="card-title m-0 text-center"><?= $row2['name'] ?></h5>
                              </div>
                            </div>
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                    <?php  } ?>
                    <!-- Slides -->
                  </div>
                </div>
              </div>
            </div>
            <!-- end timeline -->
    
          </div>
        </div>
    
        
     
      </div>
    </div>

  </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.slick-slider').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          dots: true,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 770,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 430,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });

      // var swiper = new Swiper(".swiper-container-null", {
      //   slidesPerView: 3,
      //   spaceBetween: 30,
      //   pagination: {
      //     el: ".swiper-pagination-null",
      //   },
      //   navigation: {
      //     nextEl: ".swiper-button-next",
      //     prevEl: ".swiper-button-prev",
      //   },
      // });
      <?php 
      // echo json_encode($years);
      foreach ($years as $value) { ?>
        // var swiper = new Swiper(".mySwiper<?= $value ?>", {});
        
        $('.slick-slider<?= $value ?>').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          dots: true,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 770,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 430,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
     <?php } ?>
  
});
  </script>


  <script type="text/javascript">


$(document).ready(function () {
  var mySwiper = new Swiper(".swiper", {
    autoHeight: true,
    autoplay: false,
    speed: 500,
    direction: "horizontal",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    loop: false,
    effect: "slide",
    spaceBetween: 40,
    on: {
      init: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(0).addClass("active");
      },
      slideChangeTransitionStart: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(mySwiper.realIndex).addClass("active");
      }
    }
  });
  $(".swiper-pagination-custom .swiper-pagination-switch").click(function () {
    mySwiper.slideTo($(this).index());
    $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
    $(this).addClass("active");
  });
});

  </script>

        <?php include('components/footer.php'); ?>
</body>

</html>
