<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php // include('components/sidebar.php'); ?>
        
     <div class="main-panel w-100">        
        <div class="content-wrapper py-5">
          <div class="row">
            
           
          <?php 
            $years = array(); 
            include 'admin/dbConfig.php';
            $sql0 = mysqli_query($db, "SELECT * FROM `year` ORDER BY id DESC");
            while ($row0 = mysqli_fetch_assoc($sql0)){ 

              array_push($years, $row0['id']);
            // } 
            // foreach ($years as $year) { 
              ?>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <h2 class="text-capitalize text-center" <?= ($_SESSION['language']=='en') ? "":"dir='rtl'" ?> ><?= ($_SESSION['language']=='en') ? $row0['name']:$row0['arname'] ?></h2>
                  <p class="text-justify" <?= ($_SESSION['language']=='en') ? "":"dir='rtl'" ?> ><?= ($_SESSION['language']=='en') ? $row0['description']:$row0['ardescription'] ?></p>
                </div>
                <div class="card-body pt-0">                  
                  <br>
                  <div class="slick-slider<?= $row0['id'] ?>">
                  <?php 
                    $sql2 = mysqli_query($db, "SELECT * FROM awards WHERE status=1 AND year='".$row0['id']."'");
                    while ($row2 = mysqli_fetch_assoc($sql2)){ ?>
                      <a href="award-detail.php?id=<?= $row2['id'] ?>">
                        <div class="card mx-2">
                          <img loading="lazy" style="max-height: 300px;min-height: 300px;object-fit: contain;" src="<?= json_decode($row2['image'])[0] ?>" class="card-img-top" alt="<?= json_decode($row2['image'])[0] ?>">
                          <div class="card-body p-0 my-2">
                            <h5 class="card-title m-0 text-center" <?= ($_SESSION['language']=='en') ? "":"dir='rtl'" ?> ><?= $row2['name'] ?></h5>
                          </div>
                        </div>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>



            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header"><h2 class="text-capitalize text-center">Others</h2></div>
                  <div class="card-body pt-0">                  
                    <br>
                    <div class="slick-slider">
                    <?php 
                      $sql2 = mysqli_query($db, "SELECT * FROM awards WHERE status=1 AND year IS NULL OR year = ''");
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
              </div>
            </div>

          

    
          </div>
        </div>
    
        
     
      </div>
    </div>

  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.slick-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        autoplaySpeed: 3000,
        responsive: [
          {
            breakpoint: 770,
            settings: {slidesToShow: 2,slidesToScroll: 1}
          },
          {
            breakpoint: 430,
            settings: {slidesToShow: 1,slidesToScroll: 1}
          }
        ]
      });

      <?php foreach ($years as $value) { ?>
        $('.slick-slider<?= $value ?>').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          dots: true,
          autoplaySpeed: 3000,
          responsive: [
            {
              breakpoint: 770,
              settings: {slidesToShow: 2,slidesToScroll: 1}
            },
            {
              breakpoint: 430,
              settings: {slidesToShow: 1,slidesToScroll: 1}
            }
          ]
        });
     <?php } ?>
  
});
  </script>

        <?php include('components/footer.php'); ?>
</body>

</html>
