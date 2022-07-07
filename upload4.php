<?php
// echo json_encode($_POST);
// echo json_encode($_FILES);
// upload for category
include 'admin/dbConfig.php';
$statusMsg = '';
// $filename = $_FILES['file']['name'];
$description = $_POST['description'];
$ardescription = $_POST['ardescription'];
$year = $_POST['year'];
$display_order = $_POST['display_order'];
// Print_r($Name);
if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];
   
	/* Location */
	$location = "upload/desc/".uniqid().'_'.$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png");

	$response=0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
	   	/* Upload file */
		
	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			echo $location ;
			
			// exit();
	   	} else {$location='';echo "Invalid File ".$filename;exit();}
	}else {$location='';}
}else {$location='';}

if (!empty($_POST['id'])) {
	$update= mysqli_query($db, "UPDATE `description` SET `description`='$description',`ardescription`='$ardescription',`year`='$year',`display_order`='$display_order'".((!empty($location))?(",`image`='$location'"):(''))." WHERE id=".$_POST['id']);
} else {
	$insert= mysqli_query($db, "INSERT INTO `description`(`id`, `description`, `ardescription`, `image`, `year`, `display_order`, `status`, `creation_date`, `modified_date`) VALUES ('','$description','$ardescription', '$location','$year','$display_order','1','','')");
            if($insert){$last_id = mysqli_insert_id($db);} 
}


echo 0;

               
			  

