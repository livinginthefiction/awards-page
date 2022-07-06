<?php 
	session_start();
	echo $_SESSION['language']=$_POST['language'];
?>