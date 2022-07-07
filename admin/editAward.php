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
                  <h4 class="card-title">Edit Award</h4>
                   <!-- <p class="card-description">
                    Upload Partner logo
                   </p> -->
          <?php 
            if (!empty($_GET['id'])) {
              include 'dbConfig.php';
              $sql = mysqli_query($db, "SELECT * FROM awards WHERE id=".$_GET['id']);
              $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
              // echo "<pre>";
              // print_r($row);
              // echo "</pre>";
            }
          ?>

<form id="data" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input class="form-control" value="<?= (isset($row['name']))?($row['name']):('') ?>" type="text" name="name" id= "name" required  />
    <label for="year">Year</label>
    <select  class="form-control" id="year" name="year">
        <?php 
            include 'dbConfig.php';
            $sql0 = mysqli_query($db, "SELECT * FROM year");
            while ($row0 = mysqli_fetch_assoc($sql0)){ ?>
                <option <?= (isset($row['year']) && ($row['year']==$row0['id']))?('selected'):('') ?> value="<?php echo $row0["id"] ?>"> <?php echo $row0["name"] ?> </option>
        <?php } ?>        
    </select>
    <label for="display_order">Display Order</label>
    <select  class="form-control" id="display_order" name="display_order">
        <option value=""></option>
        <?php 
            include 'dbConfig.php';
            $sql0 = mysqli_query($db, "SELECT * FROM description");
            while ($row0 = mysqli_fetch_assoc($sql0)){ ?>
                <option <?= (isset($row['display_order']) && ($row['display_order']==$row0['id']))?('selected'):('') ?> value="<?php echo $row0["id"] ?>"> <?php echo $row0["description"] ?> </option>
        <?php } ?>        
    </select>
    <input class="form-control" value="<?= (isset($row['id']))?($row['id']):('') ?>" type="hidden" name="id" id= "id"  />
    <input class="form-control" value='<?= (isset($row['image']))?($row['image']):(json_encode(array())) ?>' type="hidden" name="image" id= "image"  />
    <br>
    <label for="name">Select Category</label>
    <select  class="form-control js-example-basic-single" id="category_id" name="category_id">
              <?php 
          include 'dbConfig.php';
          $sql0 = mysqli_query($db, "SELECT * FROM category WHERE status=1 and parent_category=0");
          while ($row0 = mysqli_fetch_assoc($sql0)){ ?>
            <optgroup label="<?= $row0["name"] ?>">
          <?php 
          $sql = mysqli_query($db, "SELECT * FROM category WHERE status=1 and parent_category=".$row0["id"]);
          while ($row1 = mysqli_fetch_assoc($sql)){
          ?>
         <option <?= (isset($row['category_id']) && ($row['category_id']==$row1['id']))?('selected'):('') ?> value="<?php echo $row1["id"] ?>"> <?php echo $row1["name"] ?> </option>
         <?php } ?>
         </optgroup>
         <?php } ?>
            
      </select>
    <br>
     <label>File upload</label>
    <input <?= (isset($row['id']))?(''):('required') ?>  accept=".jpg,.jpeg,.png" class="form-control file-upload-info" name="files[]" id="files" type="file"  multiple />
    <?php if (isset($row['image'])) {
          $image = json_decode($row['image']);
          
          echo '<br><label>Delete Images</label>';
          echo '<div class="row">';
          foreach ($image as $key => $value) { ?>
            <div class="col-xs-4 col-sm-3 col-md-3  text-center">
                <label class="image-checkbox">
                    <img class="img-responsive" src="../<?= $value ?>">
                    <input name="deleteImg" value="<?= $value ?>" type="checkbox">
                    <i class="fa fa-check d-none"></i>
                </label>
            </div>
    <?php }
    echo '</div>';
    } ?>
    
    <br>
     <label>Description</label>
     <textarea id="basiexample"><?= (isset($row['description']))?($row['description']):('') ?></textarea>
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
  <script src="https://cdn.tiny.cloud/1/630wqelzy67q1lxsmj8z3myrimczdkl8e4x01sd4lrewk7ce/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js" type="text/javascript"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript">
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode != 45 && charCode > 31
        && (charCode < 48 || charCode > 57))
         return false;

        return true;
    }

       $("form#data").submit(function(e) {
    e.preventDefault();    
    var fd = new FormData();
    // var files = $('#file')[0].files;
    // console.log(files);
    var name=  $("#name").val();
    var display_order=  $("#display_order").val();
    var year=  $("#year").val();
    var id=  $("#id").val();
    var image=  $("#image").val();
    var basiexample=tinyMCE.activeEditor.getContent();
    // var basiexample=  $("#basiexample").val();
    var category_id=  $("#category_id").val();
    var deleteImg = [];
    $.each($("input[name='deleteImg']:checked"), function(){            
                deleteImg.push($(this).val());
            });
    if (deleteImg) {deleteImg=JSON.stringify(deleteImg)}

    // files.forEach(function myFunction(item, index) {console.log(index);});

    var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      fd.append("files[]", document.getElementById('files').files[index]);
   }
 
    // fd.append('file',files[0]);
    fd.append('filecount',files.length);
    fd.append('name',name);
    fd.append('display_order',display_order);
    fd.append('year',year);
    fd.append('image',image);
    fd.append('id',id);
    fd.append('description',basiexample);
    fd.append('category_id',category_id);
    fd.append('delete',deleteImg);
    $.ajax({
        url: '../upload2.php',
        type: 'POST',
        data: fd,
        success: function (data) {
            console.log(data)
            // alert(data)
            window.location.replace('viewAwards.php');
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

    </script>

    <script type="text/javascript">
      
tinymce.init({
  selector: 'textarea#basiexample',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


    // tinymce.init({
    //   selector: 'textarea',
    //   plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    //   toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
    //   toolbar_mode: 'floating',
    //   tinycomments_mode: 'embedded',
    //   tinycomments_author: 'Author name',
    // });

    </script>

    <script>// image gallery
                // // init the state from the input
                // $(".image-checkbox").each(function () {
                //     if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                //         $(this).addClass('image-checkbox-checked');
                //     } else {
                //         $(this).removeClass('image-checkbox-checked');
                //     }
                // });
    
                // sync the state to the input
                $(".image-checkbox").on("click", function (e) {
                    $(this).toggleClass('image-checkbox-checked');
                    var $checkbox = $(this).find('input[type="checkbox"]');
                    $checkbox.prop("checked", !$checkbox.prop("checked"))
    
                    e.preventDefault();
                });
                //# sourceURL=pen.js
                $(document).ready(function() {
                    $('#category_id').select2();
                });
            </script>
<style type="text/css">
  .img-responsive {
    display: block;
    max-width: 100%;
    max-height: 200px ;
    height: auto;
  }
                /*image gallery*/
                .image-checkbox {
                    cursor: pointer;
                    box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    -webkit-box-sizing: border-box;
                    border: 4px solid transparent;
                    margin-bottom: 0;
                    outline: 0;
                }
                .image-checkbox input[type="checkbox"] {
                    display: none;
                }
    
                .image-checkbox-checked {
                    border-color: #4783B0;
                }
                .image-checkbox .fa {
                    position: relative;
                    color: #4A79A3;
                    background-color: #fff;
                    padding: 10px;
                    top: 0;
                    right: 0;
                }
                .image-checkbox-checked .fa {
                    display: block !important;
                }

                .select2-container--default .select2-selection--single .select2-selection__rendered {line-height: 11px;}
</style>
</body>

</html>
