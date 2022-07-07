
<?php
  include('../session.php');
  include '../dbConfig.php';
  $query = "SELECT * FROM description WHERE status = 1".((!empty($_GET['search'])) ? (" AND description LIKE '%".$_GET['search']."%'") : (""))." LIMIT ".$_GET['offset'].",".$_GET['limit'];  
  $sql = mysqli_query($db, $query);
  $data =array();
  $counter = $_GET['offset']+1;
  while ($row1 = mysqli_fetch_assoc($sql)){
    $row1['counter']= $counter;
    array_push($data, $row1) ;
    $counter++;
  }

  $query2 = "SELECT count(id) as count FROM description WHERE status = 1"; 
  $sql2 = mysqli_query($db, $query2);
  // $data2 =array();
  // while ($row2 = mysqli_fetch_assoc($sql2)){array_push($data2, $row2);}
  echo json_encode(array('rows' =>$data ,'total' => mysqli_fetch_array($sql2,MYSQLI_ASSOC)['count'] ));
?>