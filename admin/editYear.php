<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include('components/sidebar.php'); ?>
      

     <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Year </h4>
                   <!-- <p class="card-description">
                    Upload Partner logo
                   </p> -->
          <?php 
            if (!empty($_GET['id'])) {
              include 'dbConfig.php';
              $sql = mysqli_query($db, "SELECT * FROM year WHERE id=".$_GET['id']);
              $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            }
          ?>

<form id="data" method="post" enctype="multipart/form-data">
    <label for="name">Year</label>
    <input class="form-control" value="<?= (isset($row['id']))?($row['id']):('') ?>" type="hidden" name="id" id= "id"  />
    <input class="form-control" value="<?= (isset($row['name']))?($row['name']):('') ?>" type="number" name="name" id= "name" required  />
    <br>

    <label for="arname">سنة</label>
    <input class="form-control" value="<?= (isset($row['arname']))?($row['arname']):('') ?>" type="number" name="arname" id= "arname" required  />
    <br>
   
    
    <button class="file-upload-browse btn btn-primary">Submit</button>
</form>
                
                </div>
              </div>
            </div>
    
          </div>
        </div>
    
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
     
      </div>
     
    </div>

  </div>
 
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  
  <script type="text/javascript">

       $("form#data").submit(function(e) {
    e.preventDefault();    
     var fd = new FormData();
    // var files = $('#file')[0].files;
    // var files = $('#file')[0].files;
    var name=  $("#name").val();
    var arname=  $("#arname").val();
    var id=  $("#id").val();
    // var parent_category=  $("#parent_category").val();
 
    // fd.append('file',files[0]);
    fd.append('name',name);
    fd.append('arname',arname);
    fd.append('id',id);
    $.ajax({
        url: '../upload3.php',
        type: 'POST',
        data: fd,
        success: function (data) {
            alert(data)
            window.location.replace('viewDescription.php');
            // admin/viewCategory.php
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

  // $(document).ready(function() {
  //   $('#parent_category').select2();
  // });
</script>

</body>

</html>
