<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php // include('components/sidebar.php'); ?>
        
     <div class="main-panel w-100">        
        <div class="content-wrapper py-1">
          <div class="row">
            
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="font-weight-bolder text-center"><?= $lang['categorylist'] ?></h2> 
                  <br>
                  <div class="row row-cols-1 row-cols-md-3">
                    <?php 
                      include 'admin/dbConfig.php';
                    $sql = mysqli_query($db, "SELECT * FROM category WHERE status=1");
                    while ($row = mysqli_fetch_assoc($sql)){ ?>
                      <a href="listawards.php?id=<?= $row['id'] ?>">
                      <div class="col mb-4">
                        <div class="card">
                          <img style="max-height: 400px;" src="<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['image'] ?>">
                          <div class="card-body p-0 my-2">
                            <h5 class="card-title m-0 text-center"><?= $row['name'] ?></h5>
                          </div>
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


        <?php include('components/footer.php'); ?>
</body>

</html>
