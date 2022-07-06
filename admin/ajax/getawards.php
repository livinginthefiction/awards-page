
<?php
  include('../session.php');
  include '../dbConfig.php';

  $query = "SELECT a.*,c.name as category FROM `awards` a JOIN category c ON a.category_id=c.id WHERE a.status = 1".((!empty($_GET['search'])) ? (" AND a.name LIKE '%".$_GET['search']."%' OR c.name LIKE '%".$_GET['search']."%'") : (""))." LIMIT ".$_GET['offset'].",".$_GET['limit'];  
  $sql = mysqli_query($db, $query);
  $data =array();
  $counter = $_GET['offset']+1;
  while ($row1 = mysqli_fetch_assoc($sql)){
    $row1['counter']= $counter;
    array_push($data, $row1) ;
    $counter++;
  }

  $query2 = "SELECT count(a.id) as count FROM `awards` a JOIN `category` c ON a.category_id=c.id WHERE a.status = 1"; 
  $sql2 = mysqli_query($db, $query2);
  $data2 =array();

  echo json_encode(array('rows' =>$data ,'total' => mysqli_fetch_array($sql2,MYSQLI_ASSOC)['count'] ));
?>