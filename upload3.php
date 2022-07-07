<?php

// upload for awards
include 'admin/dbConfig.php';

$Name = $_POST['name'];
$ArName = $_POST['arname'];



if (!empty($_POST['id'])) {
	$sql = "UPDATE `year` SET `name`='$Name', `arname`='$ArName' WHERE id=".$_POST['id'];
	$update= mysqli_query($db, $sql);
} else {
	$sql = "INSERT INTO `year`(`id`, `name`, `arname`, `status`, `creation_date`, `modified_date`) VALUES ('','$Name','$ArName','1', '', '')";
	$insert= mysqli_query($db, $sql);
    if($insert){$last_id = mysqli_insert_id($db);} 
}


echo 'success';

               
			  

