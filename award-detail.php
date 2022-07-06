<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper unset-min-height">
      <?php 
        if (!empty($_GET['id'])) {
          include 'admin/dbConfig.php';
          $sql = mysqli_query($db, "SELECT * FROM awards WHERE id=".$_GET['id']);
          $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
          // echo "<pre>";
          // print_r($row);
          // echo "</pre>";
        }
      ?>

     <div class="main-panel w-100 unset-min-height">        
        <div class="content-wrapper py-1 ">
          <div class="row">
            
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <br>
                  <div class="row">
                    <div class="col-md-5">
                      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php 
                          $images = json_decode($row['image']);
                          foreach ($images as $key => $value) { ?>
                          <li data-target="#carouselExampleFade" data-slide-to="<?= $key ?>" class="<?= ($key==0)? 'active':''?>"></li>
                          <?php } ?>
                        </ol>
                        <div class="carousel-inner">
                          <?php 
                            $images = json_decode($row['image']);
                            foreach ($images as $key => $value) { ?>
                            <div class="carousel-item <?= ($key==0)? 'active':''?>">
                              <!-- <img style="max-height: 300px;object-fit: contain;" src="<?= $value ?>" class="d-block w-100" alt="Award Slide <?= $key ?>"> -->
                              <figure class="zoom" onmousemove="zoom(event)" style="background-image: url(<?= $value ?>)">
                                <img src="<?= $value ?>" />
                              </figure>
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </button>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <h2 class="font-weight-bolder text-center mb-5"><?= $row['name'] ?></h2>
                      <?= $row['description'] ?>

                    </div>
                  </div>
                
                </div>
              </div>
            </div>

    
          </div>
        </div>
    
     
      </div>
     
    </div>

  </div>

    <?php include('components/footer.php'); ?>
</body>
<style type="text/css">
  figure.zoom {
  background-repeat: no-repeat;
  background-position: 50% 50%;
  position: relative;
  width: 100%;
  cursor: zoom-in;
}
figure.zoom img:hover {
  opacity: 0;
}
figure.zoom img {
  transition: opacity .5s;
  display: block;
  width: 100%;
}
</style>
<script type="text/javascript">
  function zoom(e){
    console.log('e',e);
    var zoomer = e.currentTarget;
    console.log('zoomer',zoomer);
    e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
    e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
    x = offsetX/zoomer.offsetWidth*100
    y = offsetY/zoomer.offsetHeight*100
    zoomer.style.backgroundPosition = x + '% ' + y + '%';
    // zoomer.style.transform = scale(1.5);
  }
</script>
</html>
