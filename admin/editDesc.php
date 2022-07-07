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
                  <h4 class="card-title">Edit Description </h4>
                   <!-- <p class="card-description">
                    Upload Partner logo
                   </p> -->
          <?php 
            if (!empty($_GET['id'])) {
              include 'dbConfig.php';
              $sql = mysqli_query($db, "SELECT * FROM description WHERE id=".$_GET['id']);
              $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            }
          ?>

<form id="data" method="post" enctype="multipart/form-data">
    <label for="editoren">Description</label>
    <input class="form-control" value="<?= (isset($row['id']))?($row['id']):('') ?>" type="hidden" name="id" id= "id"  />
    <!-- <input class="form-control" value="<?= (isset($row['name']))?($row['name']):('') ?>" type="text" name="name" id= "name" required  /> -->
    <div id="editoren"><?= (isset($row['description']))?($row['description']):('') ?></div>
                
    <br>
    <label style="direction: rtl;" for="editorar">وصف</label>
    <div style="direction:rtl !important;" id="editorar"><?= (isset($row['ardescription']))?($row['ardescription']):('') ?></div>
                
    <br>
    <label for="name">Year</label>
    <select  class="form-control js-example-basic-single" id="year" name="year">
              <?php 
          include 'dbConfig.php';
          $sql = mysqli_query($db, "SELECT * FROM year WHERE status=1");
          while ($row1 = mysqli_fetch_assoc($sql)){
          ?>
          <!-- <option></option> -->
         <option <?= (isset($row['year']) && ($row['year']==$row1['id']))?('selected'):('') ?> value="<?php echo $row1["id"] ?>"> <?php echo $row1["name"] ?> </option>
         <?php
          }
          ?>
            
      </select>     
    <br>
    <br>
    <label for="display_order">Display Order</label>
    <input class="form-control" value="<?= (isset($row['display_order']))?($row['display_order']):('') ?>" type="number" name="display_order" id= "display_order" required  />
      <br>
     <label>File upload</label>
    <input <?= (isset($row['id']))?(''):('required') ?> accept=".jpg,.jpeg,.png" class="form-control file-upload-info" name="file" id="file" type="file" />
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
<style type="text/css">
   .select2-container--default .select2-selection--single .select2-selection__rendered {position: absolute;top: 1px;}
 </style>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript">

       $("form#data").submit(function(e) {
    e.preventDefault();    
     var fd = new FormData();
    var files = $('#file')[0].files;
    // var description=  $("#editoren").val();
    // var ardescription=  $("#editorar").val();
    var description=  editoren.getData();
    var ardescription=  editorar.getData();
    var id=  $("#id").val();
    var year=  $("#year").val();
    var display_order=  $("#display_order").val();
 
    fd.append('file',files[0]);
    fd.append('description',description);
    fd.append('ardescription',ardescription);
    fd.append('id',id);
    fd.append('year',year);
    fd.append('display_order',display_order);
    $.ajax({
        url: '../upload4.php',
        type: 'POST',
        data: fd,
        success: function (data) {
            // console.log(data);
            alert(data)
            window.location.replace('viewDescription.php');
            // admin/viewCategory.php
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

  $(document).ready(function() {
    $('#year').select2();
  });


ClassicEditor
        .create( document.querySelector( '#editoren' ) )
        .then( editor => { console.log( editor ); editoren = editor; } )
        .catch( error => { console.error( error ); } );

ClassicEditor
        .create( document.querySelector( '#editorar' ), {language: 'ar'} )
        .then( editor => { console.log( editor ); editorar = editor; } )
        .catch( error => { console.error( error ); } );


</script>

</body>

</html>
