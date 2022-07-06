<?php
// upload for category
include 'admin/dbConfig.php';
$statusMsg = '';
// $filename = $_FILES['file']['name'];
$Name = $_POST['name'];
$parent_category = $_POST['parent_category'];
// Print_r($Name);
if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];
   
	/* Location */
	$location = "upload/".uniqid().'_'.$filename;
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
	$update= mysqli_query($db, "UPDATE `category` SET `name`='$Name',`parent_category`='$parent_category".((!empty($location))?(",`image`='$location'"):(''))." WHERE id=".$_POST['id']);
} else {
	$insert= mysqli_query($db, "INSERT INTO category (id,name,image,parent_category) VALUES ('','$Name', '$location','$parent_category')");
            if($insert){$last_id = mysqli_insert_id($db);} 
}


echo 0;

               
			  

