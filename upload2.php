<?php

// upload for awards
include 'admin/dbConfig.php';
$images = (isset($_POST['image'])) ? json_decode($_POST['image']) : array() ;
// print_r($images);
$Name = $_POST['name'];
$description = $_POST['description'];
$category_id = $_POST['category_id'];
$year = $_POST['year'];

if (isset($_FILES['files'])) {
	$valid_extensions = array("jpg","jpeg","png");
	// Count # of uploaded files in array
$total = count($_FILES['files']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
  //Get the temp file path
  $tmpFilePath = $_FILES['files']['tmp_name'][$i];
  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "upload/".uniqid().'_'. $_FILES['files']['name'][$i];
    $imageFileType = pathinfo($newFilePath,PATHINFO_EXTENSION);
		$imageFileType = strtolower($imageFileType);
    //Upload the file into the temp dir
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
    	if(move_uploaded_file($tmpFilePath, $newFilePath)) {array_push($images, $newFilePath);}
  	}else {echo "Invalid File ".$tmpFilePath;exit();}
  }
}
}
	
if (!empty($_POST['delete'])) {$images=array_values(array_diff($images, json_decode($_POST['delete'])));}
if (!empty($images)) {$images=json_encode($images);}

// if(isset($_FILES['file']['name'])){

// 	/* Getting file name */
// 	$filename = $_FILES['file']['name'];
   
// 	/* Location */
// 	$location = "upload/".$filename;
// 	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
// 	$imageFileType = strtolower($imageFileType);

// 	/* Valid extensions */
// 	$valid_extensions = array("jpg","jpeg","png");

// 	$response=0;
// 	/* Check file extension */
// 	if(in_array(strtolower($imageFileType), $valid_extensions)) {
// 	   	/* Upload file */
		
// 	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
// 			echo $location ;
			
// 			// exit();
// 	   	} else {$location='';}
// 	}else {$location='';}
// }else {$location='';}

if (!empty($_POST['id'])) {
	echo$sql = "UPDATE `awards` SET `name`='$Name', `description`='$description', `year`='$year', `category_id`='$category_id'".((!empty($images))?(",`image`='$images'"):(''))." WHERE id=".$_POST['id'];
	$update= mysqli_query($db, $sql);
} else {
	$sql = "INSERT INTO awards (`id`, `name`, `image`, `description`, `category_id`, `year`) VALUES ('','$Name','$images','$description', '$category_id', '$year')";
	$insert= mysqli_query($db, $sql);
    if($insert){$last_id = mysqli_insert_id($db);} 
}


echo 'success';

               
			  

