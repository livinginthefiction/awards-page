
<?php
  include('../session.php');
  include '../dbConfig.php';
  $query = "UPDATE category SET status = 1 - status WHERE id =".$_GET['id'];  
  $sql = mysqli_query($db, $query);
  header('Location:../viewCategory.php');

 ?>